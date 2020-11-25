<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Contest;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\Contest\Seeker\SelectPodium;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMailSeekerSelectPodium implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Contest::whereNull('status')
            ->whereDate('time_end', '>', now())
            ->get()
            ->each(function ($contest) {
                Mail::to($contest->user)->send(
                    new SelectPodium($contest, $contest->user)
                );
            });
    }
}
