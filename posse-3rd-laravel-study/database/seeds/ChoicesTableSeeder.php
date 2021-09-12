<?php

use Illuminate\Database\Seeder;

class ChoicesTableSeeder extends Seeder
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
            'name' => 'たかなわ',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '1',
            'name' => 'たかわ',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '1',
            'name' => 'こうわ',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '1',
            'name' => 'かめと',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '1',
            'name' => 'かめど',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '1',
            'name' => 'かめいど',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'むこうひら',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'むきひら',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'むかいなだ',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'みつぎ',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'みよし',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'question_id' => '2',
            'name' => 'おしらべ',
            'valid' => '0'
        ];

        DB::table('choices')->insert($param);
    }
}
