<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ItemType;
use Faker\Generator as Faker;

$factory->define(ItemType::class, function (Faker $faker) {
    $array = array('Thuốc', 'Thực phẩm chức năng', 'Sản phẩm khác');
    $name = $faker->unique()->randomElement($array);

    return [
        'name' => $name,
        'description' => 'Công dụng của ' . $name . ' là...',
        'image' => $faker->imageUrl(640, 480),
    ];
});
