<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('password')
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
