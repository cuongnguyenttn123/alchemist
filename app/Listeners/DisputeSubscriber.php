<?php

namespace App\Listeners;

use Mail;
use Notification;
use App\Models\User;
use App\Mail\Dispute\MailStart;

use App\Mail\Dispute\MailToAbiter;
use Illuminate\Support\Facades\Log;

use App\Mail\Dispute\ArbiterReviewCase;

use App\Notifications\Dispute\NotifUser;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\Dispute\SendResult;
use App\Mail\Dispute\ArbiterResult;
use App\Mail\Dispute\SeekerDisputeInvoice;
use App\Notifications\Dispute\AfterPayment;
use App\Notifications\Dispute\NotifArbiter;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Dispute\ConfirmAccept;
use App\Notifications\Dispute\DisputeAccept;
use App\Notifications\Dispute\DisputeCancel;

use App\Notifications\Dispute\InviteArbiter;
use App\Mail\Dispute\AlchemistDisputeInvoice;
use App\Notifications\Dispute\DisputeRequest;
use App\Notifications\Dispute\NotifStartVote;
use App\Notifications\Dispute\NotifAfterVoted;
use App\Notifications\Dispute\NotifDisputeStart;
use App\Mail\Dispute\ArbiterArbitrationInvitation;
use App\Mail\Dispute\AllArbitersAccepted;
use App\Mail\Dispute\DisputeResultsArbiterPlaintiffDefendant;

class DisputeSubscriber
{

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function inviteArbiter($event)
    {
        $dispute = $event->dispute;
        $list = $event->list;
        $emails = $list->pluck('email')->toArray();
        
        Notification::send($list, new InviteArbiter($dispute));

        foreach ($emails as $email) {
            Mail::to($email)->send(
                new ArbiterArbitrationInvitation(
                    User::where('email', $email)->first(),
                    $dispute->plaintiff,
                    $dispute,
                    $dispute->project
                )
            );
        }

        return true;
    }

    public function notifDisputeRequest($event)
    {
        $dispute = $event->dispute;

        $dispute->defendant->notify((new DisputeRequest($dispute->milestone)));

        return true;
    }

    public function notifAccept($event)
    {
        $dispute = $event->dispute;

        if ($dispute->is_plaintiff) {
            $dispute->defendant->notify((new DisputeAccept($dispute)));
        } else {
            $dispute->plaintiff->notify((new DisputeAccept($dispute)));
        }

        return true;
    }

    public function notifCancel($event)
    {
        $dispute = $event->dispute;

        $dispute->defendant->notify((new DisputeCancel($dispute)));
        $dispute->plaintiff->notify((new DisputeCancel($dispute)));

        return true;
    }

    public function notifDisputeStart($event)
    {
        $dispute = $event->dispute;

        Notification::send([$dispute->plaintiff, $dispute->defendant], new NotifDisputeStart($dispute));
        $emails = [$dispute->plaintiff->email, $dispute->defendant->email];

        Mail::to($dispute->plaintiff)->send(new AllArbitersAccepted(
            $dispute,
            $dispute->project,
            $dispute->milestone,
            $dispute->plaintiff
        ));

        Mail::to($dispute->defendant)->send(new AllArbitersAccepted(
            $dispute,
            $dispute->project,
            $dispute->milestone,
            $dispute->defendant
        ));

        return true;
    }

    public function notifUser($event)
    {
        $dispute = $event->dispute;

        if (!$dispute->case_user_from()); {
            Notification::send($dispute->plaintiff, new NotifUser($dispute));
        }
        if (!$dispute->case_user_to()); {
            Notification::send($dispute->defendant, new NotifUser($dispute));
        }

        //sent mail

        return true;
    }

    public function notifArbiter($event)
    {
        $dispute = $event->dispute;

        $arbiters_id = $dispute->arbiters_pending()->pluck('user_arbiter_id')->toArray();
        $users = User::whereIn('id', $arbiters_id)->get();

        Notification::send($users, new NotifArbiter($dispute));

        //sent mail

        return true;
    }

    public function notifStartVote($event)
    {
        $dispute = $event->dispute;
        $arbiters_id = $dispute->arbiters_accept()->pluck('user_arbiter_id')->toArray();
        $users = User::whereIn('id', $arbiters_id)->get();

        Notification::send($users, new NotifStartVote($dispute));

        $users->each(function ($arbiter) use ($dispute) {
            Mail::to($arbiter)->send(new ArbiterReviewCase(
                $arbiter,
                $dispute,
                $dispute->case_user_from(),
                $dispute->case_user_to()
            ));
        });

        return true;
    }

    public function afterArbitersVoted($event)
    {
        $dispute = $event->dispute;

        if ($dispute->plaintiff->is_seeker()) {
            if ($dispute->is_from_win()) {
                $dispute->plaintiff->notify((new SendResult($dispute, ['win', 'Pay'])));
                $dispute->defendant->notify((new SendResult($dispute, ['lose', 'Receive'])));
            } else {
                $dispute->plaintiff->notify((new SendResult($dispute, ['lose', 'Pay'])));
                $dispute->defendant->notify((new SendResult($dispute, ['win', 'Receive'])));
            }
        } else {
            if ($dispute->is_from_win()) {
                $dispute->plaintiff->notify((new SendResult($dispute, ['win', 'Receive'])));
                $dispute->defendant->notify((new SendResult($dispute, ['lose', 'Pay'])));
            } else {
                $dispute->plaintiff->notify((new SendResult($dispute, ['lose', 'Receive'])));
                $dispute->defendant->notify((new SendResult($dispute, ['win', 'Pay'])));
            }
        }

        $results_dispute = $dispute->results_dispute();
        $users = $dispute->arbiters_accept();

        foreach ($users as $a) {
            Mail::to($a->user_arbiter)->send(new DisputeResultsArbiterPlaintiffDefendant(
                $a->user_arbiter,
                $dispute,
                $users,
                $dispute->case_user_from(),
                $dispute->case_user_to()
            ));

            Mail::to($a->user_arbiter)->send(new ArbiterResult($a, $dispute, $dispute->project, $users, $a->is_win));

            if ($a->is_win) {
                $tkn = $results_dispute->tkn_win;
            } else {
                $tkn = $results_dispute->tkn_lose;
            }

            Notification::send($a->user_arbiter, new NotifAfterVoted($dispute, $tkn));
        }

        Mail::to($dispute->plaintiff)->send(new DisputeResultsArbiterPlaintiffDefendant(
            $dispute->plaintiff,
            $dispute,
            $users,
            $dispute->case_user_from(),
            $dispute->case_user_to()
        ));

        Mail::to($dispute->defendant)->send(new DisputeResultsArbiterPlaintiffDefendant(
            $dispute->defendant,
            $dispute,
            $users,
            $dispute->case_user_from(),
            $dispute->case_user_to()
        ));

        return true;
    }

    public function paymentDispute($event)
    {
        $dispute = $event->dispute;
        $dispute->alchemist->notify((new AfterPayment($dispute)));

        Mail::to($dispute->plaintiff)->send(new SeekerDisputeInvoice(
            $dispute->plaintiff,
            $dispute->defendant,
            $dispute,
            $dispute->project
        ));

        Mail::to($dispute->defendant)->send(new AlchemistDisputeInvoice(
            $dispute->plaintiff,
            $dispute->defendant,
            $dispute,
            $dispute->project
        ));
    }

    public function confirmDispute($event)
    {
        $dispute = $event->dispute;
        $dispute->seeker->notify((new ConfirmAccept($dispute)));
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\DisputeArbiter\InviteArbiter',
            'App\Listeners\DisputeSubscriber@inviteArbiter'
        );

        $events->listen(
            'App\Events\DisputeArbiter\DisputeRequest',
            'App\Listeners\DisputeSubscriber@notifDisputeRequest'
        );

        $events->listen(
            'App\Events\DisputeArbiter\DisputeAccept',
            'App\Listeners\DisputeSubscriber@notifAccept'
        );

        $events->listen(
            'App\Events\DisputeArbiter\CancelDispute',
            'App\Listeners\DisputeSubscriber@notifCancel'
        );

        $events->listen(
            'App\Events\DisputeArbiter\NotifDisputeStart',
            'App\Listeners\DisputeSubscriber@notifDisputeStart'
        );

        $events->listen(
            'App\Events\DisputeArbiter\NotifArbiter',
            'App\Listeners\DisputeSubscriber@notifArbiter'
        );

        $events->listen(
            'App\Events\DisputeArbiter\NotifUser',
            'App\Listeners\DisputeSubscriber@notifUser'
        );

        $events->listen(
            'App\Events\DisputeArbiter\NotifStartVote',
            'App\Listeners\DisputeSubscriber@notifStartVote'
        );

        $events->listen(
            'App\Events\DisputeArbiter\AfterArbitersVoted',
            'App\Listeners\DisputeSubscriber@afterArbitersVoted'
        );

        $events->listen(
            'App\Events\DisputeArbiter\Confirm',
            'App\Listeners\DisputeSubscriber@confirmDispute'
        );

        $events->listen(
            'App\Events\DisputeArbiter\Payment',
            'App\Listeners\DisputeSubscriber@paymentDispute'
        );
    }
}
