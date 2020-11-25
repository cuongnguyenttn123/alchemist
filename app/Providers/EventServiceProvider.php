<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\TestEvent' => [
            'App\Listeners\SendEmailAfterRegister',
            'App\Listeners\SendSMSAfterRegister',
        ],
        'App\Events\NewProject' => [
            'App\Listeners\ListenerNewProject',
        ],
        'App\Events\NewBid' => [
            'App\Listeners\ListenerNewBid',
        ],
        'App\Events\AwardBid' => [
            'App\Listeners\ListenerAwardBid',
        ],
        'App\Events\AcceptProject' => [
            'App\Listeners\SendEmailAfterAcceptProject',
        ],
        'App\Events\CancelProject' => [
            'App\Listeners\SendEmailAfterCancelProject',
        ],
        'App\Events\NewMessage' => [
            'App\Listeners\NotifNewMessage',
        ],
        'App\Events\Shortlisted' => [
            'App\Listeners\NotifShortlisted',
        ],
        'App\Events\RequestMilestone' => [
            'App\Listeners\NotifRequestMilestone',
        ],

        'App\Events\NewReportStatus' => [
          'App\Listeners\ListennerReportStatus',
        ],


        'App\Events\NewContest' => [
            'App\Listeners\ListenerNewContest',
        ],

        'Illuminate\Mail\Events\MessageSent' => [
            'App\Listeners\MailSentListener',
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'App\Listeners\DisputeSubscriber',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
