<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Project;
use App\Models\Category;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        /*$users = DB::table('users')->pluck('id');
        foreach ($users as $id) {
	    	DB::table('users')
	            ->where('id', $id)
	            ->update([
	            	'avatar' => $faker->imageUrl('150', '150', 'people'),
	            	// 'profile_banner' => $faker->imageUrl('1200', '450', 'people'),
	        ]);
	    }*/

        // factory(Category::class, 17)->create();
        // factory(Project::class, 10)->create();

        //add project category
        /*foreach ((range(1, 40)) as $index) 
	    {
	      DB::table('project_category')->insert(
	        [
	        '_project' => App\Models\Project::all()->random()->id,
	        '_category' => App\Models\Category::all()->random()->id,
	        ]
	      );
	    }*/

        /*$project_ids = DB::table('project')->pluck('id');

	    function random_minmax($min=0, $max=100, $num=4){
		    $groups             = array();
		    $group              = 0;
		    while(array_sum($groups) != $max)
		    {
		        $groups[$group+1] = mt_rand($min, 6);
		    
		        if(++$group == $num)
		        {
		            $group  = 0;
		        }
		    }
		    return $groups;
		}
        foreach ($project_ids as $id) {
        	// $gr = random_minmax(1,10,4);
        		// dump($gr);
        		$bien = random_minmax(1,10,4);
			    if(count($bien)==4){
			        // var_dump($bien);
			    }else {
			        $bien = random_minmax(1,10,4);
			    }
        	foreach ((range(1, 4)) as $index){
        		// dump($gr[$index]);
	            DB::table('milestone')->insert([
	                '_project'      => $id,
	                'title'       	=> $faker->sentence,
	                'description'   => $faker->paragraph(20),
			        'time_start' 	=> $faker->dateTimeBetween('+2 days', '+5 days'),
			        'time_end' 		=> $faker->dateTimeBetween('+6 days', '+20 days'),
			        'percent_payment'	=> $bien[$index]*10,
			        '_status'		=> App\Models\MilestoneStatus::all()->random()->id,
			        'content'		=> $faker->paragraph(200)
	            ]);
	        }
	        // if($id == 10) return;
        }*/

    }
}
