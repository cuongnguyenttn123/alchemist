<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class UserPointSeeder extends Seeder
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

        foreach (range(1,50) as $index) {
            DB::table('user_point')->insert([
                '_user'      => $faker->randomElement($user_ids),
                'type_point' => 'sbp',
                'point'       => $faker->numberBetween(8, 40)
            ]);
        }
    }
}
