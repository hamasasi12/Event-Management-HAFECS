<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // // Buat user biasa
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // // // Buat admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        // Panggil seeder tambahan
        $this->call([
            TrainerSeeder::class,
            SeminarSeeder::class,
            RoleSeeder::class,
            AdditionalMessageTemplatesSeeder::class
        ]);
    }
}
