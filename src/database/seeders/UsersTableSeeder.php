<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'test1',
            'email' => 'test@example1.com',
            'password' => Hash::make('testtesttest'),
            'remember_token' => Str::random(10),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'test2',
            'email' => 'test@example2.com',
            'password' => Hash::make('testtesttest'),
            'remember_token' => Str::random(10),
        ];
        DB::table('users')->insert($param);
    }
}
