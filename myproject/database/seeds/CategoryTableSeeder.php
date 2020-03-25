<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class, 10)->create()->each(function ($item) {
            $item->posts()->attach(\App\Models\Post::all()->random(rand(1, 5)));
        });
    }
}
