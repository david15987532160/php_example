<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as FakerGenerator;

$factory->define(\App\Item::class, function (FakerGenerator $faker) {
    return [
        'name' => $faker->lexify('Thuốc ?????'),
        'item_type_id' => rand(1, 3),
        'description' => 'Công dụng: ' . $faker->paragraphs(3, true),
        'unit_price' => $faker->numerify(),
        'promotion_price' => $faker->numerify(),
        'image' => $faker->imageUrl(640, 480, true, 'Faker'),
        'in_stock' => rand(0, 9999),
        'searched_times' => rand(0, 999999),
    ];
});
