<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ItemTypeTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ConversationTableSeeder::class);
        $this->call(ReplyTableSeeder::class);
    }
}
