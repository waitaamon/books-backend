<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = '[
            {
                "title": "English",
                "description": "english language"
            },
            {
                "title": "French",
                "description": "french language"
            }
        ]';

        foreach (json_decode($languages) as $language) {

            $l = new \App\Models\Language();
            $l->title = $language->title;
            $l->description = $language->description;
            $l->save();
        }
    }
}
