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
        Schema::create('all_access_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tiket');
            $table->string('nama');
            $table->string('kontak');
            $table->foreignId('designer_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_access_tickets');
    }
};
