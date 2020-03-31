<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Conversation;
use Faker\Generator as Faker;

$factory->define(Conversation::class, function (Faker $faker) {
    $userIds = \App\User::all()->pluck('id');

    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'user_id' => $faker->randomElement($userIds),
        'best_reply_id' => '1'
    ];
});
