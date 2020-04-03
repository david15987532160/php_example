<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as FakerGenerator;

$factory->define(\App\Models\Item::class, function (FakerGenerator $faker) {
    $name = $faker->lexify('?????');
    $price = $faker->numerify();

    return [
        'name' => 'Thuốc ' . $name,
        'item_type_id' => rand(1, 3),
        'description' => 'Công dụng: ' . $faker->paragraphs(3, true),
        'unit_price' => $price,
        'promotion_price' => $price - ($price * (rand(0, 5) * (10 / 100))),
        'image' => $faker->imageUrl(640, 480, 'food', 'Faker'),
        'in_stock' => rand(0, 9999),
        'searched_times' => rand(0, 999999),
        'origin' => 'Made in: Viet Nam',
        'ingredients' => 'Thành phần: ' . $faker->paragraph(3),
        'item_code' => strtoupper($faker->bothify('????####')),
        'status' => rand(1, 3),
        'expiration' => $faker->dateTimeBetween('+1 years', '+2 years'),
        'rating' => rand(0, 5),
        'producer' => 'Nhà sản xuất: ' . $faker->company,
    ];
});
