<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class list_type_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $array_type = array('Featured', 'Sealed', 'NDA Requirement', 'Urgent', 'Fulltime', 'Project Manager Position');
        foreach ($array_type as $type)
        {
            DB::table('list_type')->insert([
                'type_name'      => $type,
                'description'   => str_replace('-', ' ', $type),
                'created_at' 	=> Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' 	=> Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        
    }
}
