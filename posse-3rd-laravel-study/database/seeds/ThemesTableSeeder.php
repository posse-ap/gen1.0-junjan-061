<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'question_id' => '1',
            'image' => '1.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '1',
            'image' => '2.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '1',
            'image' => '3.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '1',
            'image' => '4.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '1',
            'image' => '5.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'image' => '6.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'image' => '7.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'image' => '8.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'image' => '9.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'image' => '10.png'
        ];
        DB::table('themes')->insert($param);
    }
}
