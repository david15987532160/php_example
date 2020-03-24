<?php

use Illuminate\Database\Seeder;

class ItemTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ItemType::class, 3)->create()->each(function ($item) {
            $item->items()->saveMany(factory(\App\Item::class, 5)->make());
        });
    }
}
