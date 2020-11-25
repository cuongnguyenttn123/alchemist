<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class PostLikeSeeder extends Seeder
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
        $post_ids = DB::table('post')->pluck('id');

        foreach ($post_ids as $id_post) {
	        foreach (range(1,2) as $index) {
	            DB::table('post_liked')->insert([
	                '_user'      => $faker->randomElement($user_ids),
	                '_post'      => $id_post,
	                'like'       => $faker->numberBetween(0, 1)
	            ]);
	        }
	    }
    }
}
