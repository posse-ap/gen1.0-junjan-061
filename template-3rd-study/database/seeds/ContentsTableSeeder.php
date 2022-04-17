<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'contents' => 'N予備校',
            'color' => '#FF0000',
        ];
        DB::table('contents')->insert($param);

        $param = [
            'contents' => 'ドットインストール',
            'color' => '#FF0000',
        ];
        DB::table('contents')->insert($param);

        $param = [
            'contents' => 'POSSE課題',
            'color' => '#FF0000',
        ];
        DB::table('contents')->insert($param);
    }
}
