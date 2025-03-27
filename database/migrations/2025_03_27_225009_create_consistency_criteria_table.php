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
        Schema::create('consistency_criteria', function (Blueprint $table) {
            $table->id();
            $table->json('criteria_ids');
            $table->decimal('lambda_max', 10, 9);
            $table->decimal('CI', 10, 9);
            $table->decimal('CR', 10, 9);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consistency_criteria');
    }
};