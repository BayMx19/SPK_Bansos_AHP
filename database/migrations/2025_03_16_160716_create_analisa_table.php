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
        Schema::create('analisa', function (Blueprint $table) {
            $table->id();
            $table->json('data')->nullable();
            $table->string('tipe')->nullable();
            $table->integer('criteria_id')->nullable();
            $table->integer('subcriteria_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisa');
    }
};
