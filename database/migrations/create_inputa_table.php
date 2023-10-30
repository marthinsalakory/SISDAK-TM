<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inputa', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('pendidikan_pasca_sarjana')->nullable();
            $table->string('prodi_s2')->nullable();
            $table->string('ijasah_s2')->nullable();
            $table->string('prodi_s3')->nullable();
            $table->string('ijasah_s3')->nullable();
            $table->string('bidang_keahlian')->nullable();
            $table->string('kesesuaian_bidang_keahlian')->nullable();
            $table->string('jabatan_akademik')->nullable();
            $table->string('sk_jabatan_akademik')->nullable();
            $table->string('nomor_sertifikat_pendidikan_profesional')->nullable();
            $table->string('sertifikat_pendidikan_profesional')->nullable();
            $table->string('matakuliah_diampu')->default('[]');
            $table->string('kesesuaian_matakuliah_diampu')->nullable();
            $table->string('matakuliah_diampu_pada_prodi_lain')->default('[]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputa');
    }
};
