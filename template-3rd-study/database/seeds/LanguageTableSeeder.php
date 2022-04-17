<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'language' => 'javascript',
            'color' => '#FF0000',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'css',
            'color' => '#00FF00',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'php',
            'color' => '#00FF00',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'html',
            'color' => '#00FF00',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'laravel',
            'color' => '#00FF00',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'sql',
            'color' => '#00FF00',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'shell',
            'color' => '#00FF00',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'other',
            'color' => '#00FF00',
        ];
        DB::table('Language')->insert($param);
    }
}
