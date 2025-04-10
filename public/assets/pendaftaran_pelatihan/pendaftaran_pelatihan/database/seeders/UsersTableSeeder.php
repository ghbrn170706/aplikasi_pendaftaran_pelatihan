<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Insert Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com', // Email default admin
            'password' => Hash::make('admin123'), // Password default admin
            'alamat' => null,
            'no_hp' => null,
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert User
        DB::table('users')->insert([
            'name' => 'User Default',
            'email' => 'user@example.com', // Email default user
            'password' => Hash::make('user123'), // Password default user
            'alamat' => null,
            'no_hp' => null,
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
