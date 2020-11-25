<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

use App\Models\User;
use App\Models\Project;
use App\Models\Category;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'username' => 'admin',
//            'email' => 'admin@gmail.com',
//            'password' => bcrypt('123123'),
//        ]);
      for ( $i = 1; $i <= 50; $i++){
        DB::table('users')->insert([
            'username' => 'alchemist'.$i,
            'first_name' => 'alchemist'.$i,
            'last_name' => 'test',
            'sex' => 1,
            '_status' => 1,
            'email' => 'alchemist'.$i.'@gmail.com',
            'password' => bcrypt('alchemist'),
            'is_activated' => 1,
        ]);
      }


        // factory(User::class, 1)->create();
        /*$status_ids = DB::table('user_status')->pluck('id');
        $faker = Faker::create();
        foreach (range(1,888) as $index) {
            DB::table('users')->insert([
                'username' => $faker->userName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => bcrypt('123123'),
                '_status' => $faker->randomElement($status_ids),
            ]);
        }*/
        /*DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
        ]);*/
        /*$user_ids = DB::table('users')->pluck('id');
        $role_ids = DB::table('roles')->pluck('id');

        foreach ($user_ids as $id) {
            DB::table('role_user')->insert([
                'user_id'      => $id,
                'role_id'       => $faker->randomElement($role_ids)
            ]);
        }*/
    }
}
