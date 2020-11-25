<?php

use Illuminate\Database\Seeder;

use App\Models\Rating;

class SeedRating extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratings = Rating::all();

        foreach ($ratings as $rt) {
        	if ($rt->point == 0) {
        		$rt->point = $rt->value*2.5;

        		$rt->save();
        		// dump($rt->point);
        		// dd($rt->value*2.5);
        	}
        }
    }
}
