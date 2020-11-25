<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents('http://country.io/names.json');
        $homepages = json_decode($data, true);

        foreach ($homepages as $key => $value) {
            DB::table('location')->insert([
                'country'      => $value,
                'country_code' => $key
            ]);
        }
    }
}
