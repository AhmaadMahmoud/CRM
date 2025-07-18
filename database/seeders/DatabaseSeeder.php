<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

            $user = \App\Models\User::factory()->create([
                'name' => 'Ahmed Mahmoud',
                'email' => 'ahmaaadmahmoud2@gmail.com',
                'password' => bcrypt(123456789),
            ]);
            $user->assignRole('Admin');
    }
}
