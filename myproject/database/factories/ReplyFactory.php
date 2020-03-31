<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    $userIds = \App\User::all()->pluck('id');
    $conversationIds = \App\Models\Conversation::all()->pluck('id');

    return [
        'body' => $faker->text,
        'user_id' => $faker->randomElement($userIds),
        'conversation_id' => $faker->randomElement($conversationIds)
    ];
});
