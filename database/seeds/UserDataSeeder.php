<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use App\Models\User;
use App\Libs\Calculator;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $users = User::all();
        $role_ids = DB::table('roles')->pluck('id');

        foreach ($users as $user) {
        	// if ($user->get_usermeta('hourly_hire') == '') {
                // $vl = $user->set_usermeta('hourly_hire', $faker->numberBetween($min = 15, $max = 50));
                // dump($vl) ;
                // return;
        	// }
            // $user->update(['credit_lock' => 50]);
            /*if ($user->role()->count() < 1) {
                // dump($user->full_name);
                $user->role()->sync($faker->randomElement($role_ids));
            }*/
            if (strpos($user->avatar, 'lorempixel') == true) { 
                $user->update(['avatar' => '']);
                // return;
            }
        }
    }
}
