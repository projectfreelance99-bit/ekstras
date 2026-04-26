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
        Schema::create('absen_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id'); // Foreign Key ke tabel siswa
            $table->string('masuk', 1)->nullable();
            $table->string('izin', 1)->nullable();
            $table->string('sakit', 1)->nullable();
            $table->unsignedBigInteger('ekstrakurikuler_id'); // FK ke ekstrakurikuler
            $table->date('tanggal_absensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen_siswas');
    }
};
