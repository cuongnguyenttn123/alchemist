<?php

namespace App\Listeners;

use Storage;
use URL;
use File;

use App\Events\TestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailAfterRegister
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TestEvent  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
        // Tam dung 10 phut
        // sleep(600);
        dd($event);
        $fileName = 'vkl.txt';
        $data = 'test thu'; 
        File::put(public_path($fileName), $data);
        return true;
    }
}
