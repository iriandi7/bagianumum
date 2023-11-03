<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Galeri;
use App\Models\Kalender;
use App\Models\Organisasi;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'profile_photo' => 'profile/b219a7c1-4b2a-4f4f-923a-7dad8c2b62fe.png'
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'profile_photo' => 'profile/b219a7c1-4b2a-4f4f-923a-7dad8c2b62fe.png'
        ]);

        // Organisasi::factory(5)->create();
        // Ruangan::factory(5)->create();
        // Galeri::factory(10)->create();
    }
}
