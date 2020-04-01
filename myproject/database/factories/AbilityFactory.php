<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Ability::class, function (Faker $faker) {
    $array = array('manage whole page', 'edit forum', 'view post');
    $ability = $faker->unique()->randomElement($array);

    return [
        'name' => ucfirst($ability),
        'label' => strtoupper($ability)
    ];
});
