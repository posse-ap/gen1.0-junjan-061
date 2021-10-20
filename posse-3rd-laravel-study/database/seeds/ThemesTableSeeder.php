<?php

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
            'name' => 'この地名は何て読む？'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '1',
            'name' => 'この地名は何て読む？'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'この地名は何て読む？'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'この地名は何て読む？'
        ];
        DB::table('themes')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'この地名は何て読む？'
        ];
        DB::table('themes')->insert($param);
    }
}
