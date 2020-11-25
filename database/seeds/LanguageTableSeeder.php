<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = array('English', 'French', 'Spanish');
        foreach ($languages as $language)
        {
            DB::table('language')->insert([
                'language_name'      => $language,
                'description'       => $language
            ]);
        }
    }
}
