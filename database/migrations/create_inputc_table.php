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
        Schema::create('inputc', function (Blueprint $table) {
            $table->id();
            $table->string('sumber_pembiayaan')->nullable();
            $table->string('judul_penelitian')->nullable();
            $table->string('file')->nullable();
            $table->string('tahun')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputc');
    }
};
