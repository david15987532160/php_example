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
        factory(\App\Models\Post::class, 50)->create()->each(function ($item) {
            $item->tags()->attach(\App\Models\Tag::all()->random(rand(1, 3)));
        });
    }
}
