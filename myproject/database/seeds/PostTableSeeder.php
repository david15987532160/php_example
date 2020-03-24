<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Post::class, 20)->create()->each(function ($item) {
            $item->tags()->attach(\App\Tag::all()->random(rand(1, 3)));
        });
    }
}
