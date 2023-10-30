<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class mediaPublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media_publikasi')->insert(['nama' => 'Jurnal Nasional Tidak Terakreditasi']);
        DB::table('media_publikasi')->insert(['nama' => 'Jurnal Nasional Terakreditasi']);
        DB::table('media_publikasi')->insert(['nama' => 'Jurnal Internasional']);
        DB::table('media_publikasi')->insert(['nama' => 'Jurnal Internasional Bereputasi']);
        DB::table('media_publikasi')->insert(['nama' => 'Seminar Wilayah/Lokal/Perguruan Tinggi']);
        DB::table('media_publikasi')->insert(['nama' => 'Seminar Nasional']);
        DB::table('media_publikasi')->insert(['nama' => 'Seminar Internasional']);
        DB::table('media_publikasi')->insert(['nama' => 'Tulisan Di Media Massa Wilayah']);
        DB::table('media_publikasi')->insert(['nama' => 'Tulisan Di Media Massa Nasional']);
        DB::table('media_publikasi')->insert(['nama' => 'Tulisan Di Media Massa Internasional']);
    }
}
