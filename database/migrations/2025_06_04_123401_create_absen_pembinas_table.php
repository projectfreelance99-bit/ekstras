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
        Schema::create('absen_pembinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembina_id'); // FK ke tabel users atau pembinas
            $table->string('status_absensi', 255); // Contoh: Hadir, Izin, Sakit
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen_pembinas');
    }
};
