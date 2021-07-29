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
        $param = [
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => 12,
        ];
        DB::table('people')->insert($param);
    
        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@flower.jp',
            'age' => 34,
        ];
        DB::table('people')->insert($param);
    
        $param = [
            'name' => 'sachiko',
            'mail' => 'sachiko@happy.jp',
            'age' => 56,
        ];
        DB::table('people')->insert($param);
    }
}
