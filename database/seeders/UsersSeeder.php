<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@example.test',
            'password' => Hash::make('secret'),
            'role' => 'admin',
        ]);

        User::query()->create([
            'name' => 'User',
            'email' => 'user@example.test',
            'password' => Hash::make('secret'),
            'role' => 'user',
        ]);
    }
}
