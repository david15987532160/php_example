<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    $user = $faker->userName;
//    $categoryIDs = DB::table('categories')->pluck('id');

    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'users' => ucfirst($user),
        'mail' => $user . '@gmail.com',
    ];
});
