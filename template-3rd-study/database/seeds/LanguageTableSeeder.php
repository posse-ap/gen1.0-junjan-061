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
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'css',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'php',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'html',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'laravel',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'sql',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => 'shell',
        ];
        DB::table('Language')->insert($param);

        $param = [
            'language' => '情報システム基礎知識(その他)',
        ];
        DB::table('Language')->insert($param);
    }
}
