<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil kelas lainnya
        $this->call([
            PengaturanSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            MatakuliahSeeder::class,
            mediaPublikasiSeeder::class,
        ]);
    }
}
