<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Pengaturan $pengaturan): void
    {
        $pengaturan->create([
            'k2' => '1',
            'k6' => '1',
            'k7' => '1',
            'k22' => 'bg-lightblue',
            'k24' => 'sidebar-dark-lightblue',
            'k26' => 'bg-lightblue',
        ]);
    }
}
