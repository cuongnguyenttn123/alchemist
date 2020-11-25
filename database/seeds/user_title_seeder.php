<?php

use Illuminate\Database\Seeder;

class user_title_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$title_alchemist = ['Apprentice', 'Journeyman', 'Artisan', 'Warlock', 'Master', 'Grand Master'];
    	$title_seeker = ['Merchant 1','Merchant 2','Merchant 3','Merchant 4','Merchant 5','Merchant 6'];
        $array_title = [
        	0 => [
        		'min_level' => '1',
        		'max_level' => '15',
        		'min_rp' => '0',
        		'max_rp' => '500',
        		],
        	1 => [
        		'min_level' => '16',
        		'max_level' => '30',
        		'min_rp' => '501',
        		'max_rp' => '1500',
        		],
        	2 => [
        		'min_level' => '31',
        		'max_level' => '50',
        		'min_rp' => '1501',
        		'max_rp' => '5000',
        		],
        	3 => [
        		'min_level' => '51',
        		'max_level' => '75',
        		'min_rp' => '5001',
        		'max_rp' => '10000',
        		],
        	4 => [
        		'min_level' => '76',
        		'max_level' => '99',
        		'min_rp' => '10001',
        		'max_rp' => '15000',
        		],
        	5 => [
        		'min_level' => '100',
        		'max_level' => '1000',
        		'min_rp' => '15001',
        		'max_rp' => '1000000',
        		],
        ];
        foreach ($array_title as $key => $title)
	    {
	    	$title['name'] = $title_alchemist[$key];
	    	$title['type'] = 'seeker';
	    	dump($title);
        	DB::table('user_title')->insert($title);
	    }
        dd('alooo');
    }
}
