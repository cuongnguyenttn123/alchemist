<?php

namespace App\Mail\Dispute;

use App\Models\User;
use App\Models\Dispute;
use App\Models\Project;
use App\Models\Milestone;
use App\Models\DisputeCase;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArbiterReviewCase extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $arbiter;
    public $dispute;
    public $plaintiffCase;
    public $defendantCase;

    /**
     * Create a new message instance.
     *
     * @param App\Models\User $arbiter
     * @param App\Models\Dispute $dispute
     * @param App\Models\DisputeCase $plaintiffCase
     * @param App\Models\DisputeCase $defendantCase
     * @return void
     */
    public function __construct(User $arbiter, Dispute $dispute, DisputeCase $plaintiffCase, DisputeCase $defendantCase)
    {
        $this->arbiter = $arbiter;
        $this->dispute = $dispute;
        $this->plaintiffCase = $plaintiffCase;
        $this->defendantCase = $defendantCase;

        $this->plaintiffCase->load('dispute_attachments');
        $this->defendantCase->load('dispute_attachments');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Review Case')
            ->view('emails.dispute.arbiter-review-case');
    }
}
