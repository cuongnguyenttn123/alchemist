<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\MilestoneStatus;
use App\Models\Project;
use App\Models\Payment;
use App\Models\Bid;

use Carbon\Carbon;

class Milestone extends Model
{
    protected $table = 'milestone';
    protected $fillable = [
        'title', 'description', 'percent_payment', '_project', 'content', 'time_start', 'time_end'
    ];
    protected $casts = ['preview' => 'array', 'delivery' => 'array'];

    /**
     * @author khaih
     * @email khaihoangdev@gmail.com
     * @desc get list mile with project id passing
     * @return [Milestone]
     * @time 12/21/2018
     * @status Finish
     */
    public function miles($_project)
    {
        return $this->where('_project', $_project)->get();
    }
    /**
     * @author khaih
     * @email khaihoangdev@gmail.com
     * @desc delete all row match with project id
     * @return
     * @time 12/28/2018
     * @status Finish
     */
    public function _delete_all($_project)
    {
        return $this->where('_project', $_project)->delete();
    }
    /**
     * @author khaih
     * @email khaihoangdev@gmail.com
     * @desc insert new mile
     * @return
     * @time 12/28/2018
     * @status Finish
     */
    public function _update($mile, $_project = null, $_bid = null)
    {
        $this->title = $mile->title;
        $this->description = $mile->description;
        $this->percent_payment = $mile->percent_payment;
        $this->content = $mile->content ? $mile->content : "";
        if ($_project)
            $this->_project = $_project;
        if ($_bid)
            $this->_bid = $_bid;
        $this->workday = $mile->workday;

        return $this->save();
    }

    public function _update_mile_bid($mile, $_bid = null)
    {
        $this->title = $mile['title'];
        $this->description = $mile['description'];
        $this->percent_payment = $mile['percent_payment'];
        $this->_project = null;
        if ($_bid)
            $this->_bid = $_bid;
        $this->workday = $mile['workday'];

        return $this->save();
    }

    public function siblings()
    {
        return $this->hasMany(Milestone::class, '_bid', '_bid');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, '_milestone', 'id');
    }

    public function next()
    {
        $previous = null;
        foreach ($this->siblings as $bid) {
            if (!empty($previous && $previous->id == $this->id)) {
                // Yay! Our current record  is the 'next' record.
                return $bid;
            }
            $previous = $bid;
        }
        return null;
    }
    public function previous()
    {
        $previous = null;
        foreach ($this->siblings as $bid) {
            if (!empty($previous && $bid->id == $this->id)) {
                // Yay! Our previous record is the 'previous' record.
                return $previous;
            }
            $previous = $bid;
        }
        return null;
    }

    //check milestone is last item
    public function getIsLastAttribute()
    {
        if ($this->next() == null) {
            return true;
        }
        return false;
    }

    public function getCanRequestAttribute()
    {
        if (!$this->previous() || $this->previous()->status_name == 'Completed') {
            return true;
        }
        return false;
    }

    //get attach files
    public function files_preview()
    {
        if (!empty($this->preview))
            return ProjectAttachments::whereIn('id', $this->preview)->get();
    }
    public function files_delivery()
    {
        if (!empty($this->delivery))
            return ProjectAttachments::whereIn('id', $this->delivery)->get();
    }

    public function milestone_requests()
    {
        return $this->hasMany(MilestoneRequest::class, '_milestone', 'id');
    }

    public function milestone_status()
    {
        return $this->belongsTo(MilestoneStatus::class, '_status', 'id');
    }

    public function getStatusNameAttribute()
    {
        return $this->milestone_status->status;
    }

    public function bid()
    {
        return $this->belongsTo(Bid::class, '_bid', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, '_project', 'id');
    }

    public function price()
    {
        // return $this->percent_payment;
        return $this->percent_payment * $this->belongsTo(Project::class, '_project', 'id')->first()->budget / 100;
    }

    public function getPriceAttribute()
    {
        if ($this->_bid) {
            $price = $this->bid->price;
        } else {
            $price = $this->project->budget;
        }
        return $this->percent_payment * $price / 100;
    }

    public function getPriceBidAttribute()
    {
        // return $this->percent_payment;
        return $this->percent_payment * $this->bid->price / 100;
    }

    public function getUserAttribute()
    {
        return $this->bid->user;
    }

    public function getTotalDaysAttribute()
    {
        if ($this->start_work == null) return 0;
        $done_work = $this->done_work ? Carbon::createFromFormat('Y-m-d', $this->done_work) : Carbon::now();
        // return $done_work;
        $from = Carbon::createFromFormat('Y-m-d', $this->start_work);
        $diff_in_days = $done_work->diffInDays($from);
        if ($diff_in_days == 0){
          return 1;
        }
        return $diff_in_days;
    }

    public function getPercentWorkAttribute()
    {
        if ($this->total_days > 0) {
            return number_format($this->total_days/$this->workday * 100, 0);
        }
        return 0;
    }

    public function getPositionAttribute()
    {
        $ms = $this->bid()->first()->milestones()->get()->pluck('id')->toArray();
        return array_search($this->id, $ms) + 1;
    }

    public function waitingPaymentMilestone()
    {
        $status = MilestoneStatus::firstOrCreate(['status' => 'Payment Due']);
        $this->_status = $status->id;
        return $this->save();
    }

    public function completeMilestone()
    {
        $status = MilestoneStatus::firstOrCreate(['status' => 'Completed']);
        $this->_status = $status->id;
        $this->user->increment('wallet', $this->price_bid);
        // $this->payment->completePayment();
        $this->save();
    }

    public function earlyReleaseMilestone()
    {
      $status = MilestoneStatus::firstOrCreate(['status' => 'Early Release']);
      $this->_status = $status->id;
      $this->user->increment('wallet', $this->price_bid);
      // $this->payment->completePayment();
      $this->save();
    }

    public function changeStatus($status)
    {
        $ms_status = MilestoneStatus::firstOrCreate(['status' => $status]);
        $this->_status = $ms_status->id;
        $this->save();
        return $ms_status->id;
    }

  public function changeStatusProcessing($status)
  {
    $ms_status = MilestoneStatus::firstOrCreate(['status' => $status]);
    $this->_status = $ms_status->id;
    $this->start_work =date('Y-m-d');
    $this->save();
    return $ms_status->id;
  }

    public function updateStatus($status)
    {
        $ms_status = MilestoneStatus::firstOrCreate(['status' => $status]);
        $this->_status = $ms_status->id;
        $this->save();
        return $ms_status->id;
    }

    public function updateStartwork()
    {
        $this->start_work = Carbon::now();
        return $this->save();
    }

  public function getDeadlineAttribute()
  {
    if ($this->start_work == null) return $this->project->bid_end;
    return $this->project->bid_end;
  }

    public function updateDonework()
    {
        $this->done_work = Carbon::now();
        $this->save();
        if ($next = $this->next()) {
            $next->updateStartwork();
        }
        return true;
    }

    public function complete()
    {
        return true;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getPaymentReleaseDateAttribute()
    {
        return $this->payment->created_at;
    }

    /**
     * @return string
     */
    public function getPaymentDueDateAttribute()
    {
        return '14th December 2020';
    }

    public function getColorAndBackgroundAttribute(){
      $color = '';
      $back_color = '';
      $svg = 'rotate.svg';
      switch ($this->status_name){
        case 'Completed':
          $color = 'milestone-color-gree';
          $back_color = 'milestone-color-gree-bg';
          $svg = 'checked.svg';
          break;
        case 'Waiting':
          $color = 'milestone-color-waiting';
          $back_color = 'milestone-color-waiting-bg';
          $svg = '';
          break;
        case 'Block':
          $color = 'milestone-color-block';
          $back_color = 'milestone-color-block-bg';
          $svg = '';
          break;
        case 'Underway':
          $color = 'milestone-color-troi';
          $back_color = 'milestone-color-troi-bg';
          $svg = 'rotate.svg';
          break;
        case 'Payment Due':
          $color = 'milestone-color-hong';
          $back_color = 'milestone-color-hong-bg';
          $svg = 'money-bag.svg';
          break;
        case 'Created':
          $color = 'milestone-color-create';
          $back_color = 'milestone-color-waiting-bg';
          $svg = '';
          break;
        case 'Early Release':
          $color = 'milestone-color-yellow';
          $back_color = 'milestone-color-yellow-bg';
          $svg = 'handshake%20(2).svg';
          break;
        case 'Locked':
          $color = 'milestone-color-defaut';
          $back_color = 'milestone-color-defaut-bg';
          $svg = 'password.svg';
          break;
      }

      return [$color, $back_color, $svg];
    }
}
