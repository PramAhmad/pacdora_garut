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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nik');
            $table->string('nama'); 
            $table->enum('is_garut', ['ya', 'tidak'])->default('ya');
            $table->string('domisili')->nullable();
            $table->string('referensi')->nullable();
            $table->string('provinsi_id');
            $table->string('kota_id');
            $table->string('kecamatan_id');
            $table->string('kelurahan_id');
            $table->string('nama_usaha');
            $table->string('alamat_usaha');
            $table->enum('disabilitas', ['ya', 'tidak'])->default('tidak');
            $table->bigInteger('nohp');
            $table->boolean('approved')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
