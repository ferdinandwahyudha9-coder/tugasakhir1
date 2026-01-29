<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@nandsecond.com'],
            [
                'name' => 'Admin Nand Second',
                'password' => Hash::make('admin123456'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Buat test user biasa
        User::firstOrCreate(
            ['email' => 'user@test.com'],
            [
                'name' => 'John Doe',
                'password' => Hash::make('user123456'),
                'role' => 'user',
                'email_verified_at' => now(),
            ]
        );
    }
}
