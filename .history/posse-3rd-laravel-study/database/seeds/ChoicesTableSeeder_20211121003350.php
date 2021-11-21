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
            'theme_id' => '1',
            'name' => 'たかなわ',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '1',
            'name' => 'たかわ',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '1',
            'name' => 'こうわ',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '2',
            'name' => 'かめと',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '2',
            'name' => 'かめど',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '2',
            'name' => 'かめいど',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '3',
            'name' => 'むこうひら',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '3',
            'name' => 'むきひら',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '3',
            'name' => 'むかいなだ',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '4',
            'name' => 'みつぎ',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '4',
            'name' => 'みよし',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '4',
            'name' => 'おしらべ',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '5',
            'name' => 'かなやま',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '5',
            'name' => 'ぎんざん',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '5',
            'name' => 'きやま',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '6',
            'name' => 'こうじまち',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);

        $param = [
            'theme_id' => '6',
            'name' => 'おかとまち',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        
        $param = [
            'theme_id' => '6',
            'name' => 'かゆまち',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'theme_id' => '7',
            'name' => 'せいげんち',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'theme_id' => '7',
            'name' => 'いばらいち',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'theme_id' => '7',
            'name' => 'いのはらし',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'theme_id' => '8',
            'name' => 'かるが',
            'valid' => '1'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'theme_id' => '8',
            'name' => 'いがるけ',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
        $param = [
            'theme_id' => '8',
            'name' => 'かりどめや',
            'valid' => '0'
        ];
        DB::table('choices')->insert($param);
    }
}
