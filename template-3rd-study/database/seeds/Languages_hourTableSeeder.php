<?php

use Illuminate\Database\Seeder;

class Languages_hourTableSeeder extends Seeder
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
            'hour' => '7',
            'language_id' => '1',
            'user_id' => '1'
        ];
        DB::table('languages_hour')->insert($param);

        $param = [
            'date' => '2022-04-03',
            'hour' => '7',
            'language_id' => '2',
            'user_id' => '1'
        ];
        DB::table('languages_hour')->insert($param);

        $param = [
            'date' => '2022-04-03',
            'hour' => '7',
            'language_id' => '3',
            'user_id' => '1'
        ];
        DB::table('languages_hour')->insert($param);

        $param = [
            'date' => '2022-04-03',
            'hour' => '7',
            'language_id' => '4',
            'user_id' => '1'
        ];
        DB::table('languages_hour')->insert($param);

        $param = [
            'date' => '2022-04-03',
            'hour' => '7',
            'language_id' => '1',
            'user_id' => '1'
        ];
        DB::table('languages_hour')->insert($param);

        $param = [
            'date' => '2022-04-03',
            'hour' => '7',
            'language_id' => '1',
            'user_id' => '1'
        ];
        DB::table('languages_hour')->insert($param);

        $param = [
            'date' => '2022-04-03',
            'hour' => '100',
            'language_id' => '1',
            'user_id' => '2'
        ];
        DB::table('languages_hour')->insert($param);
    }
}
