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
        Schema::create('aroma_tobaccos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aroma_id')->nullable();
            $table->foreign('aroma_id')->references('id')->on('aromas')->nullOnDelete();
            $table->unsignedBigInteger('tobacco_id')->nullable();
            $table->foreign('tobacco_id')->references('id')->on('tobaccos')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aroma_tobaccos');
    }
};
