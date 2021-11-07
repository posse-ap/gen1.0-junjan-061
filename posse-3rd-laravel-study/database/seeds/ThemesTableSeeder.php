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
            'name' => 'この地名は何て読む？',
            'image' => '1.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '1',
            'name' => 'この地名は何て読む？',
            'image' => '2.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'この地名は何て読む？',
            'image' => '3.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'この地名は何て読む？',
            'image' => '4.png'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'この地名は何て読む？',
            'image' => '5.png'
        ];
        DB::table('themes')->insert($param);
    }
}
