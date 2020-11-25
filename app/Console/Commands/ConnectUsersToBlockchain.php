<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\SmartContract\BaseSequence;
use Illuminate\Console\Command;

class ConnectUsersToBlockchain extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'blockchain:connect';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'The command will get each user from the database and will create appropriate record in Ethereum network.';

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
    $client = new \App\Services\SmartContract\Client();
    $users = User::where([
      ['alchemist_blockchain_id', '=', null],
      ['seeker_blockchain_id', '=', null]
    ]);
    $users->each(function ($user) use ($client) {
      if ($user->isAlchemist()) {
        $blockchainId = BaseSequence::setSequenceByType('alchemist');
        $client->createAlchemist($blockchainId);
        $user->update(['blockchain_id' => $blockchainId]);
      } else {
        $blockchainId = BaseSequence::setSequenceByType('seeker');
        $client->createSeeker($blockchainId);
        $user->update(['blockchain_id' => $blockchainId]);
      }
    });
    $this->info('All users have been connected to the blockchain.');
  }
}
