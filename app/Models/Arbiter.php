<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Bid;
use Auth;

class Arbiter extends Model
{
	protected $table = 'arbiters';
	protected $fillable = ['vote'];
	protected $casts = ['description' => 'array'];
	//note
	//table arbiter status = 0 (wait accept), 
	//status = 1 ( accepted), status = 2 (cancellled)
	// vote = 1 (to), vote = 0 (from) 
	//end note

	public $total_arbiter;

	public function __construct()
	{
		$this->total_arbiter = 5;
	}

	public function scopeWithVoted($query)
	{
		return $query->where(['status' => 1])->whereIn('vote', [0, 1])->get();
	}

	public function scopeVotefrom($query)
	{
		return $query->where(['vote' => 0, 'status' => 1]);
	}
	public function scopeVoteto($query)
	{
		return $query->where(['vote' => 1, 'status' => 1]);
	}
	public function scopeWaiting($query)
	{
		return $query->where('status', 0);
	}
	public function scopeAccepted($query)
	{
		return $query->where('status', 1);
	}
	public function scopeYourVote($query)
	{
		return $query->where('user_arbiter_id', Auth::id());
	}


	public function user_arbiter()
	{
		return $this->belongsTo('App\Models\User', 'user_arbiter_id', 'id');
	}

	public function dispute()
	{
		return $this->belongsTo('App\Models\Dispute', 'id_dispute', 'id');
	}
	//get list user faction from
	public function user_faction_from($id_dispute)
	{
		$list_user_from = static::where([['id_dispute', '=', $id_dispute], ['faction', '=', 0],])->get();
		return $list_user_from;
	}
	//get list user faction to
	public function user_faction_to($id_dispute)
	{
		$list_user_from = static::where([['id_dispute', '=', $id_dispute], ['faction', '=', 1],])->get();
		return $list_user_from;
	}
	//get list user id arbiter
	public function list_arbiter_id($id_dispute)
	{
		$list_arbiter_id = static::where([['id_dispute', '=', $id_dispute]])->pluck('user_arbiter_id')->toArray();
		return $list_arbiter_id;
	}
	//total vote faction from
	public function total_vote_faction_from($id_dispute)
	{
		$total_vote_faction_from = static::where([['id_dispute', '=', $id_dispute], ['vote', '=', 0],])->count();
		return $total_vote_faction_from;
	}
	//total vote faction to
	public function total_vote_faction_to($id_dispute)
	{
		$total_vote_faction_to = static::where([['id_dispute', '=', $id_dispute], ['vote', '=', 1],])->count();
		return $total_vote_faction_to;
	}
	//find_arbiter
	public function find_arbiter($id_dispute, $keyword)
	{
		$exclude_arbiter = $this->list_arbiter_id($id_dispute);

		$find_arbiter = User::select('users.*')
			->where(function ($query) use ($keyword) {
				if ($keyword) {
					$query->where('email', 'LIKE', '%' . $keyword . '%')
						->orWhere('username', 'LIKE', '%' . $keyword . '%')
						->orWhere('first_name', 'LIKE', '%' . $keyword . '%')
						->orWhere('last_name', 'LIKE', '%' . $keyword . '%');
				}
			})
			->where(function ($query) use ($exclude_arbiter) {
				if ($exclude_arbiter) {
					$query->whereNotIn('users.id', $exclude_arbiter);
				}
			})->get();

		return $find_arbiter;
	}
	//ramdom arbiter inRandomOrder()
	public function ramdom_arbiter($id_dispute)
	{

		$list_abiter_test = [
			/*'vukhanhthien1979@gmail.com',
            	'1caycau@gmail.com',*/
			'aschiu2001@gmail.com',
			'aschiu2002@gmail.com',
			'aschiu2003@gmail.com',
			'aschiu2004@gmail.com',
			'aschiu2005@gmail.com'
		];
		$test = true;

		$exclude_arbiter = $this->list_arbiter_id($id_dispute);

		$user_dispute = Dispute::find($id_dispute);
		$exclude_arbiter[] = $user_dispute->_user_from;
		$exclude_arbiter[] = $user_dispute->_user_to;

		// counting
		$arbiters_accept = $user_dispute->arbiters_accept()->count();
		$arbiters_pending = $user_dispute->arbiters_pending()->count();
		$total = $this->total_arbiter - $arbiters_accept - $arbiters_pending;

		$ramdom_arbiter = User::select('users.*')
			->where(function ($query) use ($exclude_arbiter, $list_abiter_test, $test) {
				if ($exclude_arbiter) {
					$query->whereNotIn('users.id', $exclude_arbiter);
				}
				if ($test) {
					$query->whereIn('users.email', $list_abiter_test);
				}
			})
			->inRandomOrder()->take($total)->get();

		return $ramdom_arbiter;
	}
	//get list arbiter
	public function list_arbiter($id_dispute)
	{
		return Arbiter::where('id_dispute', '=', $id_dispute)->whereIn('status', [0, 1])->get();
	}
	//get position in collection
	public function getRankAttribute()
	{
		$ranks = Arbiter::where('id_dispute', $this->id_dispute)->pluck('id')->toArray();
		return array_search($this->id, $ranks) + 1;
	}
	//accept arbiter
	public function accept_arbiter($data, $id_arbiter)
	{
		if ($id_arbiter) {
			$arbiter_accept = Arbiter::find($id_arbiter);
			if ($arbiter_accept) {
				if ($data['status'] != null) {
					$arbiter_accept->status = 1;
				} else {
					$arbiter_accept->status = 2;
				}
				return $arbiter_accept->save();
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	//add list arbiter
	public function add_list_arbiter_random($id_dispute, $random_arbiter_id)
	{
		$add_random_arbiter = new Arbiter;
		$add_random_arbiter->id_dispute = $id_dispute;
		$add_random_arbiter->user_arbiter_id = $random_arbiter_id;
		$add_random_arbiter->faction = null;
		$add_random_arbiter->vote = null;
		$add_random_arbiter->description = null;
		$add_random_arbiter->status = 0;
		return $add_random_arbiter->save();
	}
	//add arbiter
	public function update_arbiter($data)
	{
		if ($data['id_arbiter']) {
			$row = $this->find($data['id_arbiter']);
			if ($row) {
				return $row->update(['vote' => $data['vote'], 'description' => $data['description']]);
			} else {
				return false;
			}
		} else {
			$this->id_dispute = $data['id_dispute'];
			$this->user_arbiter_id = $data['user_arbiter_id'];
			$this->faction = null;
			$this->vote = null;
			$this->description = null;
			$this->status = 0;
			$row =  $this->save();
		}
		return $row;
	}

	public function vote_for()
	{
		if ($this->vote == 0) {
			return $this->dispute->user_from;
		} else {
			return $this->dispute->user_to;
		}
	}

	public function is_author()
	{
		return $this->user_arbiter_id === Auth::user()->id;
	}

	//siblings
	public function siblings()
	{
		return $this->hasMany(Arbiter::class, 'id_dispute', 'id_dispute')->where(['status' => 1]);
	}

	//check arbiter win or lose
	public function getIsWinAttribute()
	{
		$count = $this->siblings->where('vote', $this->vote)->count();
		return ($count >= 3) ? true : false;
	}

	//return position of arbiter
	public function getPositionAttribute()
	{
		$ms = $this->siblings->pluck('id')->toArray();
		return array_search($this->id, $ms) + 1;
	}


	public function files_plaintiff()
	{
		$media = $this->description['plaintiff']['media'] ?? [];
		if (is_array($media))
			return DisputeAttachments::whereIn('id', $media)->get();
	}
	public function files_defendant()
	{
		$media = $this->description['defendant']['media'] ?? [];
		if (is_array($media))
			return DisputeAttachments::whereIn('id', $media)->get();
	}

	public function desc()
	{
		if ($this->vote == 0) {
			return $this->description['plaintiff'] ?? "";
		} else {
			return $this->description['defendant'] ?? "";
		}
	}

	public function file_arbiters()
	{
		if ($this->vote == 0) {
			return $this->files_plaintiff();
		} else {
			return $this->files_defendant();
		}
	}
}
