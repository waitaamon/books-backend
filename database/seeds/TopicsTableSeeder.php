<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = '[
            {
                "title": "Food",
                "description": "food topic"
            },
            {
                "title": "Housing",
                "description": "housing topic"
            }
        ]';

        foreach (json_decode($topics) as $topic) {

            $t = new \App\Models\Topic();
            $t->title = $topic->title;
            $t->description = $topic->description;
            $t->save();
        }
    }
}
