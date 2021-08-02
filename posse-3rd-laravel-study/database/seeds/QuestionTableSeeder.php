<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'ガチで東京の人しか解けない！東京の難読地名クイズ',
        ];
        DB::table('question')->insert($param);
    
        $param = [
            'name' => 'ガチで広島の人しか解けない！広島の難読地名クイズ',
        ];
        DB::table('question')->insert($param);
    }
}
