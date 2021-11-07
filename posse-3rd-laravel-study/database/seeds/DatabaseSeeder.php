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
        $this->call(QuestionsTableSeeder::class);
        $this->call(ChoicesTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(RestdataTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
    }
    
}
