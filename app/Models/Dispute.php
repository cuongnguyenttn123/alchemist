<?php

namespace App\Models;

use Auth;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Arbiter;

use App\Libs\Calculator;

use App\Models\DisputeStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Database\Eloquent\Model;
use App\Events\DisputeArbiter\CancelDispute;
use App\Events\DisputeArbiter\DisputeAccept;
use App\Events\DisputeArbiter\DisputeRequest;
use App\Mail\Dispute\ArbiterArbitrationInvitation;
use App\Events\DisputeArbiter\InviteArbiter as Invite;

class Dispute extends Model
{
	protected $cast = [
		'is_from' => 'boolean',
		'is_to' => 'boolean',
		'is_plaintiff' => 'boolean',
		'is_defendant' => 'boolean'
	];
	public $rating_credit;
	public $total_arbiter;

	public $court_fee_percent;
	public $arbitration_fee_percent;
	public $credit_win_percent;

	public function __construct()
	{
		$this->rating_credit = 5;
		$this->total_arbiter = 5;
		$this->court_fee_percent = 40 / 100;
		$this->arbitration_fee_percent = 4 / 100;
		$this->credit_win_percent = 5 / 100;
	}
	protected $table = 'dispute';
	protected $fillable = ['_status'];

	public function takeCredit($price)
	{
		return $this->rating_credit * $price;
	}

	public function scopeWithStatus($query, $status)
	{
		$_status = DisputeStatus::firstOrCreate(['status' => $status]);
		return $query->where('_status', $_status->id)->orderBy('id', 'desc')->get();
	}

	public function scopeWithUser($query, $user_id)
	{
		return $query->where(function ($query) use ($user_id) {
			$query->where('_user_from', $user_id)
				->orWhere('_user_to', $user_id);
		})->where('_status', '<>', 6)
			->orderby('id', 'desc')->get();
	}

	public function scopePlaintiffWin($query, $user_id = null)
	{
		return $query->select('dispute.*', DB::raw('COUNT(dispute.id) as total'))
			->leftJoin('arbiters', 'arbiters.id_dispute', '=', 'dispute.id')
			->where('arbiters.vote', 0)
			->where(function ($query) use ($user_id) {
				if ($user_id) {
					$query->where('dispute._user_from', $user_id);
				}
			})
			->having('total', '>=', 3)
			->get();
	}

	public function scopeDefendentWin($query, $user_id = null)
	{
		return $query->select('dispute.*', DB::raw('COUNT(dispute.id) as total'))
			->leftJoin('arbiters', 'arbiters.id_dispute', '=', 'dispute.id')
			->where('arbiters.vote', 1)
			->where(function ($query) use ($user_id) {
				if ($user_id) {
					$query->where('dispute._user_to', $user_id);
				}
			})
			->having('total', '>=', 3)
			->get();
	}

	public function scopeComingDateUser($query)
	{
		return $query->where(function ($query) {
			$query->where('deadline_user', '<=', Carbon::now()->addDays(1)->toDateString());
		})->where('_status', '=', 7)
			->orderby('id', 'desc')->get();
	}

	public function scopeComingDateArbiter($query)
	{
		return $query->where(function ($query) {
			$query->where('deadline_arbiter', '<=', Carbon::now()->addDays(1)->toDateString());
		})->where('_status', '=', 7)
			->orderby('id', 'desc')->get();
	}

	public function scopeEndDateArbiter($query)
	{
		return $query->where(function ($query) {
			$query->where('deadline_arbiter', '<=', Carbon::now()->toDateString());
		})->where('_status', '=', 7)
			->orderby('id', 'desc')->get();
	}

	public function getTotalCreditAttribute($value)
	{
		return ($value == 0) ? 300 : $value;
	}

	public function getCourtFeeAttribute()
	{
		return $this->court_fee_percent * $this->total_credit;
	}

	public function getArbitrationFeeAttribute()
	{
		return $this->arbitration_fee_percent * $this->total_credit;
	}

	public function getCreditWinAttribute()
	{
		return $this->credit_win_percent * $this->total_credit;
	}

	public function getCreditLossAttribute()
	{
		return $this->court_fee - $this->credit_win;
	}

	public function getStatusNameAttribute()
	{
		return $this->status->status;
	}



	public function status()
	{
		return $this->belongsTo('App\Models\DisputeStatus', '_status', 'id');
	}
	public function arbiters()
	{
		return $this->hasMany('App\Models\Arbiter', 'id_dispute', 'id');
	}
	public function attachments()
	{
		return $this->hasMany(DisputeAttachments::class, 'dispute_id', 'id');
	}
	public function attachments_from()
	{
		return $this->attachments()->where([
			'id_user' => $this->_user_from,
			'dispute_id' => $this->id
		])->get();
	}
	public function attachments_to()
	{
		return $this->attachments()->where([
			'id_user' => $this->_user_to,
			'dispute_id' => $this->id
		])->get();
	}

	public function dispute_case()
	{
		return $this->hasMany(DisputeCase::class, 'dispute_id', 'id');
	}

	public function my_files()
	{
		return $this->attachments()->WithAuth();
	}

	//auth case
	public function my_case()
	{
		return $this->dispute_case()->WithAuth();
	}

	public function case_user_from()
	{
		return $this->dispute_case->where('user_id', $this->_user_from)->first();
	}

	public function case_user_to()
	{
		return $this->dispute_case->where('user_id', $this->_user_to)->first();
	}

	public function is_cased()
	{
		return !!$this->dispute_case->where(['user_id' => Auth::user()->id])->count();
	}

	//check dispute case
	public function check_dispute_case()
	{
		$case_user_from = DisputeCase::where(['dispute_id' => $this->id, 'user_id' => $this->_user_from])->count();
		$case_user_to = DisputeCase::where(['dispute_id' => $this->id, 'user_id' => $this->_user_to])->count();

		if ($case_user_from == 1 && $case_user_to == 1) {
			return true;
		} else {
			return false;
		}
	}


	public function getIsDecisionAttribute()
	{
		return !!$this->is_results && $this->_status == 7;
	}

	//cancel project [1,2,3]
	public function getIsNotconfirmAttribute()
	{
		return !!$this->is_decision && $this->cancel_project == null;
	}
	public function getIsCancelAttribute()
	{
		return !!$this->is_decision && $this->cancel_project == 1;
	}
	public function getIsContinueAttribute()
	{
		return !!$this->is_decision && $this->cancel_project == 2;
	}

	//check total 5 abiters voted
	public function getIsResultsAttribute()
	{
		$count = $this->arbiters()->where(['status' => 1])->whereIn('vote', [0, 1])->count();
		return ($count >= 5) ? true : false;
	}

	//check pending
	public function getIsPendingAttribute()
	{
		return $this->_status === 5;
	}

	//check total 5 abiters accepted
	public function getArbiterAcceptedAttribute()
	{
		return $this->arbiters_accept()->count() > 4;
	}

	//arbiter voted
	public function your_vote()
	{
		return $this->arbiters()->yourVote()->first();
	}

	//arbiter voted
	public function arbiters_voted()
	{
		return $this->arbiters()->WithVoted();
	}
	//arbiter accept
	public function arbiters_accept()
	{
		return $this->arbiters()->where('status', '=', 1)->get();
	}
	//arbiter pending
	public function arbiters_pending()
	{
		return $this->arbiters()->where('status', '=', 0)->get();
	}
	//arbiter decline
	public function arbiters_decline()
	{
		return $this->arbiters()->whereNotIn('status', [0, 1])->get();
	}
	//total_arbiters_vote
	public function total_arbiters_vote()
	{
		return $this->arbiters()->whereNotNull('vote')->get();
	}
	//total_arbiters_vote_from
	public function total_arbiters_vote_from()
	{
		return $this->arbiters()->VoteFrom()->get();
	}
	//total_arbiters_vote_to
	public function total_arbiters_vote_to()
	{
		return $this->arbiters()->VoteTo()->get();
	}

	public function total_vote_win()
	{
		$from = $this->total_arbiters_vote_from()->count();
		$to = $this->total_arbiters_vote_to()->count();
		return ($from > $to) ? $from : $to;
	}

	public function total_vote_lose()
	{
		$from = $this->total_arbiters_vote_from()->count();
		$to = $this->total_arbiters_vote_to()->count();
		return ($from < $to) ? $from : $to;
	}

	public function is_from_win()
	{
		return ($this->total_arbiters_vote_from()->count() >= 3) ? true : false;
	}

	public function is_to_win()
	{
		return ($this->total_arbiters_vote_to()->count() >= 3) ? true : false;
	}

	public function winner()
	{
		$total_arbiters_vote = $this->total_arbiters_vote()->count();
		$total_arbiters_vote_from = $this->total_arbiters_vote_from()->count();
		$total_arbiters_vote_to = $this->total_arbiters_vote_to()->count();


		if ($total_arbiters_vote ==  $this->total_arbiter) {
			$total = $total_arbiters_vote_from - $total_arbiters_vote_to;
			if ($total == 0) {
				$this->dispute_finished();
				return "draw";
			} else if ($total > 0) {
				$this->dispute_finished();
				return $this->user_from->full_name;
			} else {
				$this->dispute_finished();
				return $this->user_to->full_name;
			}
		}
	}

	//results_dispute
	public function results_dispute()
	{
		$total_arbiters_vote_from = $this->total_arbiters_vote_from()->count();
		$total_arbiters_vote_to =  $this->total_arbiter - $total_arbiters_vote_from;
		if ($total_arbiters_vote_from == 5 || $total_arbiters_vote_to == 5) {
			return Calculator::calculate_token($this->total_credit, 5);
		} elseif ($total_arbiters_vote_from == 4 || $total_arbiters_vote_to == 4) {
			return Calculator::calculate_token($this->total_credit, 4);
		} elseif ($total_arbiters_vote_from == 3 || $total_arbiters_vote_to == 3) {
			return Calculator::calculate_token($this->total_credit, 3);
		}
	}
	//end results_dispute


	public function plaintiff()
	{
		return $this->belongsTo('App\Models\User', '_user_from', 'id');
	}
	public function defendant()
	{
		return $this->belongsTo('App\Models\User', '_user_to', 'id');
	}
	public function getIsPlaintiffAttribute()
	{
		return $this->_user_from === Auth::user()->id;
	}
	public function getIsDefendantAttribute()
	{
		return $this->_user_to === Auth::user()->id;
	}

	public function user_from()
	{
		return $this->belongsTo('App\Models\User', '_user_from', 'id');
	}
	public function user_to()
	{
		return $this->belongsTo('App\Models\User', '_user_to', 'id');
	}
	public function versus()
	{
		if ($this->_user_from == Auth::id()) {
			return $this->defendant();
		} else {
			return $this->plaintiff();
		}
	}
	// get seeker dispute
	public function getUserPayAttribute()
	{
		if (!$this->plaintiff->is_seeker()) {
			return $this->defendant;
		} else {
			return $this->plaintiff;
		}
	}
	// get Alchemist dispute
	public function getUserReceiveAttribute()
	{
		if ($this->plaintiff->is_seeker()) {
			return $this->defendant;
		} else {
			return $this->plaintiff;
		}
	}
	public function milestone()
	{
		return $this->belongsTo('App\Models\Milestone', 'milestone_id', 'id');
	}
	public function getAmountAttribute()
	{
		return $this->milestone->price_bid;
	}
	public function project()
	{
		return $this->belongsTo('App\Models\Project', '_project', 'id');
	}

	public function permalink()
	{
		return route('dispute.single', $this->id);
	}

	//list_dispute
	public function list_disputes()
	{
		return $this->all();
	}
	//create dispute
	public function create_dispute($data)
	{

		$status = DisputeStatus::firstOrCreate(['status' => 'Pending']);

		$this->_user_from = $data['_user_from'];
		$this->_user_to = $data['_user_to'];
		$this->_project = $data['_project'];
		$this->milestone_id = $data['milestone_id'];
		$this->description = $data['description'];
		$this->_status = $status->id;
		$this->title = $data['title'];
		$this->total_credit = $data['total_credit'];
		$data =  $this->save();
		//update milestone status
		$this->milestone->changeStatus('disputing');

		//event
		event(new DisputeRequest([$this]));

		return $data;
	}
	//edit dispute
	public function update_dispute($id_dispute, $data)
	{
		$update_dispute = $this->find($id_dispute);
		$update_dispute->_user_from = $data['_user_from'];
		$update_dispute->_user_to = $data['_user_to'];
		$update_dispute->_project = $data['_project'];
		$update_dispute->milestone_id = $data['milestone_id'];
		$update_dispute->description = $data['description'];
		$update_dispute->_status = $data['_status'];
		$update_dispute->title = $data['title'];
		$update_dispute->total_credit = $data['total_credit'];
		$data =  $update_dispute->save();
		return $data;
	}

	public function accept_left()
	{
		return $this->arbiters()->where(['status' => 1, 'vote' => 0])->get();
	}
	public function accept_right()
	{
		return $this->arbiters()->where(['status' => 1, 'vote' => 1])->get();
	}

	public function getIsFromAttribute()
	{
		return $this->_user_from === Auth::user()->id;
	}

	public function getIsToAttribute()
	{
		return $this->_user_to === Auth::user()->id;
	}

	public function is_user_from()
	{
		return !!$this->where(['_user_to' => Auth::user()->id, 'id' => $this->id])->count();
	}

	public function is_user_to()
	{
		return !!$this->where(['_user_to' => Auth::user()->id, 'id' => $this->id])->count();
	}

	public function getIsArbiterAttribute()
	{
		return !!Auth::check() && $this->arbiters->where('user_arbiter_id', Auth::user()->id)->where('status', 1)->count();
	}

	public function is_arbiter()
	{
		return !!Auth::check() && $this->arbiters->where('user_arbiter_id', Auth::user()->id)->where('status', 1)->count();
	}

	public function is_voted()
	{
		return !!$this->arbiters()->where('user_arbiter_id', Auth::user()->id)->whereIn('vote', [0, 1])->count();
	}

	public function is_voted_from()
	{
		return !!$this->arbiters()->where(['user_arbiter_id' => Auth::user()->id, 'vote' => 0])->count();
	}

	public function is_voted_to()
	{
		return !!$this->arbiters()->where(['user_arbiter_id' => Auth::user()->id, 'vote' => 1])->count();
	}

	public function vote_for()
	{
		$your_vote = $this->arbiters->where('user_arbiter_id', Auth::user()->id)->pluck('vote')->first();
		if ($your_vote == 0) {
			return $this->plaintiff;
		} else {
			return $this->defendant;
		}
	}


	public function getAlchemistAttribute()
	{
		if ($this->plaintiff->is_seeker()) {
			return $this->defendant;
		} else {
			return $this->plaintiff;
		}
	}

	public function getSeekerAttribute()
	{
		if (!$this->plaintiff->is_seeker()) {
			return $this->defendant;
		} else {
			return $this->plaintiff;
		}
	}

	//check arbiter win or lose
	public function is_win($vote)
	{
		$count = $this->arbiters_voted()->where('vote', $vote)->count();
		return ($count >= 3) ? true : false;
	}
	//get text
	public function text($vote)
	{
		if ($this->is_win($vote)) {
			return 'Win';
		}
		return 'Lose';
	}
	public function getDisputeStatusAttribute()
	{
		$id_user = Auth::user()->id;
		//dispute case
		$dispute_case = $this->check_dispute_case();
		//pending invites
		$pending_invites = $this->arbiters_pending()->count();
		//arbiters_voted
		$arbiters_voted = $this->arbiters_voted()->count();
		if (0 < $pending_invites && $pending_invites <= 5) {
			return $pending_invites . '/5 Pending Invites';
		} elseif ($dispute_case == false) {
			return 'Sending Case';
		} elseif ($arbiters_voted < 5) {
			return $arbiters_voted . '/5 Arbiter Voted';
		} else {
			if ($id_user == $this->_user_from) {
				$is_from_win = $this->is_from_win();
				if ($is_from_win) {
					return 'Dispute Win';
				} else {
					return 'Dispute Loser';
				}
			}
			if ($id_user == $this->_user_to) {
				$is_to_win = $this->is_to_win();
				if ($is_to_win) {
					return 'Dispute Win';
				} else {
					return 'Dispute Loser';
				}
			}
			if ($this->plaintiff->is_seeker() && $this->is_from_win()) {
				return "Seeker Win";
			} else {
				return "Alchemist Win";
			}
		}
		return "error";
	}
	//dispute canceled
	public function dispute_canceled()
	{
		if ($this->id) {
			$status = DisputeStatus::firstOrCreate(['status' => 'Canceled']);
			return $this->update(['_status' => $status->id]);
		} else {
			return false;
		}
	}
	//dispute accept
	public function dispute_accept()
	{
		if ($this->id) {
			$status = DisputeStatus::firstOrCreate(['status' => 'Processing']);
			return $this->update(['_status' => $status->id]);
		} else {
			return false;
		}
	}
	//dispute finished
	public function dispute_finished()
	{
		if ($this->id) {
			$status = DisputeStatus::firstOrCreate(['status' => 'Finished']);
			return $this->update(['_status' => $status->id]);
		} else {
			return false;
		}
	}
	//check dispute canceled
	public function check_dispute_canceled()
	{
		$check = $this->status->status;
		if ($check == 'Canceled') {
			return true;
		} else {
			return false;
		}
	}
	//end check dispute canceled
	//check dispute accept
	public function check_dispute_accept()
	{
		$check = $this->status->status;
		if ($check == 'Processing') {
			return true;
		} else {
			return false;
		}
	}
	//end check dispute accept

	//update status
	public function updateStatus($status_name)
	{
		$status = DisputeStatus::firstOrCreate(['status' => $status_name]);
		return $this->update(['_status' => $status->id]);
	}

	public function getWinLowestAttribute()
	{
		return .08 * $this->total_credit;
	}

	public function getWinHightestAttribute()
	{
		return .25 * $this->total_credit;
	}

	public function getAmountPaymentAttribute()
	{
		if ($this->plaintiff->is_seeker()) {
			$number_vote = $this->total_arbiters_vote_from()->count();
		} else {
			$number_vote = $this->total_arbiters_vote_to()->count();
		}
		return (5 - $number_vote) / 5 * $this->amount;
	}

	public function getDeadlineStringAttribute()
	{

		$pending_invites = $this->arbiters_pending()->count();
		if (0 < $pending_invites && $pending_invites <= 5) {
			return "Deadline for Arbiter Acceptance " . $this->deadline_arbiter;
		}
		$dispute_case = $this->check_dispute_case();
		if ($dispute_case == false) {
			if ($this->deadline_user)
				return "Deadline for Case Submission " . $this->deadline_user;
		} else {
			if ($this->deadline_user)
				return "Deadline for Arbiter review and votes " . $this->deadline_arbiter;
		}
	}

	public function getDeadlineLeftAttribute()
	{
		$pending_invites = $this->arbiters_pending()->count();
		if (0 < $pending_invites && $pending_invites <= 5) {
			if ($this->deadline_arbiter)
				return Carbon::createFromFormat('Y-m-d', $this->deadline_arbiter)->diffInDays() . ' days left';
		}
		$dispute_case = $this->check_dispute_case();
		if ($dispute_case == false) {
			if ($this->deadline_user)
				return Carbon::createFromFormat('Y-m-d', $this->deadline_user)->diffInDays() . ' days left';
		}
		if ($this->deadline_arbiter)
			return Carbon::createFromFormat('Y-m-d', $this->deadline_arbiter)->diffInDays() . ' days left';
	}

	public function update_deadline($type, $day = null)
	{
		if ($type == 'user') {
			$this->deadline_user = Carbon::now()->addDays(5);
		} else {
			$day = $day ?? 10;
			$this->deadline_arbiter = Carbon::now()->addDays($day);
		}
		return $this->save();
	}

	public function actionProcess()
	{
		$this->milestone->changeStatus('Disputing');
		$this->updateStatus('Processing');
		$this->project->updateStatus('Failed');

		//spend user credit
		$this->plaintiff->spendCredit($this->court_fee);
		//spend user credit
		$this->defendant->spendCredit($this->court_fee);

		$this->update_deadline('arbiter', 5);

		// random arbiter
		$arbiter = new Arbiter;
		$random_arbiters = $arbiter->ramdom_arbiter($this->id);
		foreach ($random_arbiters as $random_arbiter) {
			$add_arbiter = $arbiter->add_list_arbiter_random($this->id, $random_arbiter->id);
		}

		//event
		event(new DisputeAccept([$this]));
		event(new Invite([$this, $random_arbiters]));
		return true;
	}

	public function actionCancel()
	{
		$this->milestone->changeStatus('Processing');
		$this->updateStatus('Canceled');
		//refund user credit
		$this->plaintiff->refundCredit($this->total_credit);
		// event
		event(new CancelDispute([$this]));
		return true;
	}

	public function invite_round_second()
	{
		$this->update_deadline('arbiter', 5);
		$this->invite_second = 1;
		$this->save();
		// random arbiter
		$arbiter = new Arbiter;
		$random_arbiters = $arbiter->ramdom_arbiter($this->id);
		foreach ($random_arbiters as $random_arbiter) {
			$add_arbiter = $arbiter->add_list_arbiter_random($this->id, $random_arbiter->id);
		}
		event(new Invite([$this, $random_arbiters]));
		return true;
	}
}
