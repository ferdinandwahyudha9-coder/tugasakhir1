<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin user
        User::create([
            'name' => 'Admin Nand Second',
            'email' => 'admin@nandsecond.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123456'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Buat test user biasa
        User::create([
            'name' => 'John Doe',
            'email' => 'user@test.com',
            'password' => \Illuminate\Support\Facades\Hash::make('user123456'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        // TODO: Tambahkan product & order seeder nanti
        $this->call([
            ProductSeeder::class,
        ]);

    }
}