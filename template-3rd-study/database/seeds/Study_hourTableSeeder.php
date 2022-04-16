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
            'date' => '2022-04-03',
            'hour' => '0',
            'content_id' => '3',
            'language_id' => '7'
            'user_id' => '1'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-04-03',
            'hour' => '0',
            'content_id' => '3',
            'language_id' => '8'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-04-03',
            'hour' => '0',
            'content_id' => '3',
            'language_id' => '9'
        ];
        DB::table('hours')->insert($param);

        $param = [
            'date' => '2022-04-03',
            'hour' => '0',
            'content_id' => '1',
            'language_id' => '10'
        ];
        DB::table('hours')->insert($param);
    }
}
