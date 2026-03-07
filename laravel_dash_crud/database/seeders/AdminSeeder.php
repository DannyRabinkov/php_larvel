<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'name' => 'Admin',
                'email' => 'admin@esn.co.il',
                'password' => Hash::make('Aa123456'),
                'user_type' => 'admin',
            ]
        ];

        DB::table('users')->insert($admin);
    }
}
