<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Wanderson Cauê',
            'email' => 'cauewandersoninfo@gmail.com',
            'user' => 'caue__sousa',
            'obs' => 'primeiro usuario cadastrado',
            'password' => Hash::make(12345678),
        ]);
    }
}
