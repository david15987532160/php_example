<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Tag::class, function (Faker $faker) {
//    $postIDs = DB::table('posts')->pluck('id');

    return [
        'name' => $faker->word,
    ];
});
