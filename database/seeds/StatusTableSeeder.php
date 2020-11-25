<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
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

         $statuses_dispute = array('accept dispute', 'decline', 'pending');
        foreach ($statuses_dispute as $status)
        {
           
            DB::table('dispute_status')->insert([
                'status'      => $status,
                'description'       => $status
            ]);
            
        }
    }
}
