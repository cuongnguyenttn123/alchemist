<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

use Illuminate\Notifications\DatabaseNotification;

use App\Models\User;

class Notification extends DatabaseNotification {

  protected $casts = ['data' => 'object'];

  protected $types = [
      'notif'   => 'App\Notifications\Other',
      'message' => ['App\Notifications\MessageNotification'],
      'job'     => [
                    'App\Notifications\JobNotification',
                    'App\Notifications\TaskNotification',

                    'App\Notifications\NewContestNotif',
                    'App\Notifications\NewProjectNotif',
                    'App\Notifications\ShortlistedNotification',
                    'App\Notifications\AwardBidNotification',
                    'App\Notifications\ReleaseNotification',
                    'App\Notifications\RequestMilestoneNotification',
                    'App\Notifications\TrackingUploadNotification',
                    'App\Notifications\NewBidNotification',
                    'App\Notifications\CompleteNotification',
                    'App\Notifications\ReviewNotification',
                    'App\Notifications\ReportStatusNotif',

                    'App\Notifications\Contest\SendResult',
                    'App\Notifications\Contest\NewEntry',

                    'App\Notifications\Dispute\NotifAfterVoted',
                    'App\Notifications\Dispute\AfterArbitersVoted',
                    'App\Notifications\Dispute\NotifStartVote',
                    'App\Notifications\Dispute\NotifDisputeStart',
                    'App\Notifications\Dispute\InviteArbiter',
                    'App\Notifications\Dispute\NotifArbiter',
                    'App\Notifications\Dispute\NotifUser',
                    'App\Notifications\Dispute\SendResult',
                    'App\Notifications\Dispute\DisputeRequest',
                    'App\Notifications\Dispute\DisputeAccept',
                    'App\Notifications\Dispute\DisputeCancel',
                    'App\Notifications\Dispute\AfterPayment',
                    'App\Notifications\Dispute\ConfirmAccept'
                  ],
      'favorite' => 'App\Notifications\Favorite'
  ];

  public function scopeUnread($query, $type = null) {

    if($type){
      $type = array_get($this->types, $type);
      return $query->whereIn('type', $type)->where(['read_at'=> null])->get();
    }

    return $query->where('read_at', null)->get();

  }

}
