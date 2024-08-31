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
        Schema::create('pendampingans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('umkm_id')->constrained('umkm');
            $table->string('klasifikasi_usaha');
            $table->string('npwp');
            $table->foreignId('bidang_usaha_id')->constrained('bidang_usahas');
            $table->string('nama_produk');
            $table->text('deskripsi_usaha');
            $table->string('web')->nullable();
            $table->string('ig')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('wa')->nullable();
            $table->string('tahun_berdiri');
            $table->string('jumlah_karyawan');
            $table->string('modal_usaha');
            $table->integer('jumlah_modal');
            $table->string('nib')->nullable();
            // Perizinan yang dimiliki
            $table->string('perizinan')->nullable();
            $table->string('pendampingan');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendampingans');
    }
};
