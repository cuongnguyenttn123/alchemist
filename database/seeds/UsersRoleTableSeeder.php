<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class UsersRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = DB::table('users')->pluck('id');
        $role_ids = DB::table('roles')->pluck('id');

        foreach ($user_ids as $id) {
            DB::table('role_user')->insert([
                'user_id'      => $id,
                'role_id'       => $faker->randomElement($role_ids)
            ]);
        }
    }
}
