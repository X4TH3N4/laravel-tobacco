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
        Schema::create('mix_aromas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mix_id')->nullable();
            $table->foreign('mix_id')->references('id')->on('mixes')->nullOnDelete();
            $table->unsignedBigInteger('aroma_id')->nullable();
            $table->foreign('aroma_id')->references('id')->on('aromas')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mix_aromas');
    }
};
