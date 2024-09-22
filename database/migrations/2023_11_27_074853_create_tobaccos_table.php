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
        Schema::create('tobaccos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('tobacco_types')->nullOnDelete();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->nullOnDelete();
            $table->unsignedBigInteger('package_type_id')->nullable();
            $table->foreign('package_type_id')->references('id')->on('package_types')->nullOnDelete();
            $table->decimal('weight', 10, 2)->nullable();
            $table->string('strength')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('stock_quantity')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('score', false, true)->nullable(); //popülerlik oranı
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tobaccos');
    }
};
