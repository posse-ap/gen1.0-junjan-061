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
        $this->call(UsersTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(Study_contentsTableSeeder::class);
        $this->call(Languages_hourTableSeeder::class);
        $this->call(Contents_hourTableSeeder::class);
    }
}
