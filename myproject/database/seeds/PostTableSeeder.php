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
//        factory(\App\Post::class, 10)->create()->each(function ($a) {
//            $a->tags()->save(factory(\App\Tag::class)->make());
//        });
        factory(\App\Tag::class, 5)->create();
        factory(\App\Post::class, 10)->create()->each(function ($a) {
            $a->tags()->attach(\App\Tag::all()->random(1));

        });
    }
}
