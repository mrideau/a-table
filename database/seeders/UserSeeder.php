<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Execution du seeder
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Matis',
            'email' => 'matis.rideau@hotmail.com',
            'password' => Hash::make('testpswd'),
        ]);
    }
}
