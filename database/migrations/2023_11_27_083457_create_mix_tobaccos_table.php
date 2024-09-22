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
        Schema::create('mix_tobaccos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mix_id')->nullable(); // Mix ID'si
            $table->foreign('mix_id')->references('id')->on('mixes')->nullOnDelete(); // Mixlere referans
            $table->unsignedBigInteger('tobacco_id')->nullable(); // Tobacco ID'si
            $table->foreign('tobacco_id')->references('id')->on('tobaccos')->nullOnDelete(); // Tütünler tablosuna referans
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mix_tobaccos');
    }
};
