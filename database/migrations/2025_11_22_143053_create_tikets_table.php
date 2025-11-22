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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('designer_id');
            $table->enum('tipe_tiket', ['vvip', 'reguler']);
            $table->string('kode_tiket')->unique();
            $table->boolean('status_kehadiran')->default(0);
            $table->string('gambar_tiket')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('kontak_pemilik')->nullable();
            $table->boolean('is_hadir')->default(0);
            $table->boolean('is_downloaded')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
