<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'testtest',
            'email' => 'testtest@com',
            'password' => 'password0'
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'testtest',
            'email' => 'user@com',
            'password' => 'password0'
        ];
        DB::table('users')->insert($param);
    }
}
