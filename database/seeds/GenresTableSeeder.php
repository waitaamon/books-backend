<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = '[
            {
                "title": "Horror",
                "description": "horror book"
            },
            {
                "title": "Motivation",
                "description": "motivation book"
            }
        ]';

        foreach (json_decode($genres) as $genre) {

            $g = new \App\Models\Genre();
            $g->title = $genre->title;
            $g->description = $genre->description;
            $g->save();
        }
    }
}
