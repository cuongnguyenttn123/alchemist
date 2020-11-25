<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use Carbon\Carbon;

use App\Models\Bid;

class BidMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$bid_id = 36;
    	$bid = Bid::find($bid_id);
    	$user_of_job = $bid->project->user->id;

        $faker = Faker::create();
        
        $user_ids = DB::table('users')->pluck('id');

    	// dd($faker->randomElement([$bid->_freelancer, $user_of_job]));

        foreach (range(1,2) as $index) {
            DB::table('bid_messages')->insert([
                '_user'   => $faker->randomElement([$bid->_freelancer, $user_of_job]),
                '_bid'      => $bid_id,
                'message'      => $faker->sentence(8),
                'created_at' 	=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' 	=> Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
