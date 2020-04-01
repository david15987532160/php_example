<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Role::class, function (Faker $faker) {
    $array = array('admin', 'moderator', 'end-user');
    $role = $faker->unique()->randomElement($array);

    return [
        'name' => ucfirst($role),
        'label' => strtoupper($role)
    ];
});
