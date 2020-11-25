<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\Dispute\MailStart;

use Carbon\Carbon;

use App\Models\Dispute;

use App\Events\DisputeArbiter\NotifArbiter;
use App\Events\DisputeArbiter\NotifUser;

class DisputeChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispute:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispute check crobjob';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // cronjob out of date
        $d = Dispute::endDateArbiter();
        foreach ($d as $dispute) {
            if($dispute->arbiters_accept()->count() < 5){
                if($dispute->invite_second == 1){
                    // cancel dispute
                    $dispute->actionCancel();
                }else {
                    // send round 2 arbiter
                    $dispute->invite_round_second();
                }
            }
        }

        // cronjob coming out of date
        $d = Dispute::comingDateArbiter();
        foreach ($d as $dispute) {
            // notif to arbiter not accept yet
            event(new NotifArbiter([$dispute]));
        }

        // cronjob coming out of date
        $d = Dispute::comingDateUser();
        foreach ($d as $dispute) {
            if(!$dispute->check_dispute_case()){
                // notif to arbiter not accept yet
                event(new NotifUser([$dispute]));
            }
        }
    }
}
