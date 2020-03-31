<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    $user = $faker->userName;

    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph(8),
        'users' => ucfirst($user),
        'mail' => $user . '@gmail.com',
    ];
});
