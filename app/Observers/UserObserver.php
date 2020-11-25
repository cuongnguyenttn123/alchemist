<?php

namespace App\Observers;

use App\Services\SmartContract\BaseSequence;
use App\Models\User;
use App\Services\SmartContract\Client;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
      $client = new Client();
      if ($user->isAlchemist()) {
        $blockchainId = BaseSequence::setSequenceByType('alchemist');
        $client->createAlchemist($blockchainId);
        $user->update(['blockchain_id' => $blockchainId]);
      } else {
        $blockchainId = BaseSequence::setSequenceByType('seeker');
        $client->createSeeker($blockchainId);
        $user->update(['blockchain_id' => $blockchainId]);
      }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
