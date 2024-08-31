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
        Schema::create('best_desains', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('model_id');
            $table->integer('urutan')->default(0);
            $table->foreign('model_id')->references('id')->on('model')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('best_desains');
    }
};
