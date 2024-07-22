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
        Schema::create('history_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('umkm_id');
            $table->unsignedBigInteger('model_id');
            $table->date('created');
            $table->string('pdf_file');
            $table->string('image_file');
            $table->foreign('umkm_id')->references('id')->on('umkm');
            $table->foreign('model_id')->references('id')->on('model');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_models');
    }
};
