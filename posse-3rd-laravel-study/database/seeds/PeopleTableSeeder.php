<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
        $param = [
            'name' => 'unko',
            'mail' => 'unko@happy.jp',
            'age' => 56,
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'unkochan',
            'mail' => 'unkochan12345@gmail.com',
            'age' => 56,
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'junichi',
            'mail' => 'junichi@happy.jp',
            'age' => 56,
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'oishi',
            'mail' => 'oishi@happy.jp',
            'age' => 56,
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'masayoshi',
            'mail' => 'masayoshi@happy.jp',
            'age' => 56,
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'hutonchan',
            'mail' => 'huton@happy.jp',
            'age' => 56,
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'yossan',
            'mail' => 'yossan@happy.jp',
            'age' => 56,
        ];
        DB::table('people')->insert($param);
    }
}