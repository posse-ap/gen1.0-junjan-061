<?php

use Illuminate\Database\Seeder;

class Study_contentsTableSeeder extends Seeder
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
        ];
        DB::table('contents')->insert($param);

        $param = [
            'contents' => 'ドットインストール',
        ];
        DB::table('contents')->insert($param);

        $param = [
            'contents' => 'POSSE課題',
        ];
        DB::table('contents')->insert($param);
    }
}
