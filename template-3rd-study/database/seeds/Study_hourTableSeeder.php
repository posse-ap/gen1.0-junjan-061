<?php

use Illuminate\Database\Seeder;

class Study_hourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'date' => '2022-03-23',
            'hour' => '735',
            'content_id' => '2',
            'language_id' => '1'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-03-23',
            'hour' => '10',
            'content_id' => '1',
            'language_id' => '2'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-03-23',
            'hour' => '2',
            'content_id' => '3',
            'language_id' => '3'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-03-23',
            'hour' => '4',
            'content_id' => '1',
            'language_id' => '4'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-03-23',
            'hour' => '4',
            'content_id' => '2',
            'language_id' => '5'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-03-23',
            'hour' => '3',
            'content_id' => '3',
            'language_id' => '6'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-03-23',
            'hour' => '7',
            'content_id' => '1',
            'language_id' => '7'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-03-23',
            'hour' => '3',
            'content_id' => '1',
            'language_id' => '8'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-03-23',
            'hour' => '8',
            'content_id' => '2',
            'language_id' => '1'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-03-23',
            'hour' => '1',
            'content_id' => '3',
            'language_id' => '2'
        ];
        DB::table('hours')->insert($param);
    }
}
