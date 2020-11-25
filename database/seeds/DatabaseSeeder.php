<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $array_roles = array('Admin', 'Editor', 'Alchemist', 'Seeker');
        foreach ($array_roles as $role)
        {
            DB::table('roles')->insert([
                'name'      => $role,
                'display_name'   => str_replace('-', ' ', $role),
                'description'       => ''
            ]);
        }
        
        $faker = Faker::create();
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);

        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
        ]);
        
        $statuses = array('active', 'block', 'inactive');
        foreach ($statuses as $status)
        {
            DB::table('user_status')->insert([
                'status'      => $status,
                'description'       => $status
            ]);
            DB::table('project_status')->insert([
                'status'      => $status,
                'description'       => $status
            ]);
            DB::table('order_status')->insert([
                'status'      => $status,
                'description'       => $status
            ]);
            DB::table('milestone_status')->insert([
                'status'      => $status,
                'description'       => $status
            ]);
            DB::table('dispute_status')->insert([
                'status'      => $status,
                'description'       => $status
            ]);
            DB::table('bid_status')->insert([
                'status'      => $status,
                'description'       => $status
            ]);
        }


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
