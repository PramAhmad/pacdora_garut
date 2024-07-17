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
        Schema::create('model', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('image');
            $table->string('subimageone')->nullable();
            $table->string('subimagetwo')->nullable();
            $table->string('title');
            $table->string('white_board');
            $table->string('flute');
            $table->unsignedBigInteger('sub_category');
            $table->foreign("sub_category")->on("sub_category")->references("id");
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->on("category")->references("id");
            $table->mediumInteger("model");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model');
    }
};
