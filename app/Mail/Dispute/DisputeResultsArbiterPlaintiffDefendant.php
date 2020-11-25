<?php

namespace App\Mail\Dispute;

use App\Models\User;
use App\Models\Dispute;
use App\Models\DisputeCase;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;

class DisputeResultsArbiterPlaintiffDefendant extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $dispute;
    public $arbiters;
    public $plaintiffCase;
    public $defendantCase;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $user
     * @param App\Models\Dispute $dispute
     * @param Illuminate\Database\Eloquent\Collection $arbiters
     * @param App\Models\DisputeCase $plaintiffCase
     * @param App\Models\DisputeCase $defendantCase
     * @return void
     */
    public function __construct(User $user, Dispute $dispute, Collection $arbiters, DisputeCase $plaintiffCase, DisputeCase $defendantCase)
    {
        $this->user = $user;
        $this->dispute = $dispute;
        $this->arbiters = $arbiters;
        $this->plaintiffCase = $plaintiffCase;
        $this->defendantCase = $defendantCase;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Dispute results')
            ->view('emails.dispute.dispute-results-arbiter-plaintiff-defendant');
    }
}
