<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use Carbon\Carbon;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $user_ids = DB::table('users')->pluck('id');

        foreach (range(1,20) as $index) {
            DB::table('bid')->insert([
                '_freelancer'   => $faker->randomElement($user_ids),
                '_project'      => 66,
                '_status'      	=> 4,
                'title'      	=> $faker->sentence(4),
                'description'   => $faker->paragraph(3),
                'price'      	=> $faker->numberBetween($min = 100, $max = 999),
                'work_time'     => $faker->numberBetween($min = 6, $max = 45),
                'created_at' 	=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' 	=> Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
