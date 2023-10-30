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
        Schema::create('inpute', function (Blueprint $table) {
            $table->id();
            $table->string('dosen_peneliti')->nullable();
            $table->string('judul_artikel')->nullable();
            $table->string('file')->nullable();
            $table->integer('jumlah_sitasi')->default(0);
            $table->string('link_artikel')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inpute');
    }
};
