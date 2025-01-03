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
        Schema::create('std_placements', function (Blueprint $table) {
            $table->increments('assign_id'); // Changed to snake_case
            $table->string('s_id', 20); // Changed to snake_case
            $table->string('block', 50)->nullable(); // Changed to snake_case
            $table->string('room', 50)->nullable(); // Changed to snake_case
            $table->string('status', 50)->nullable(); // Changed to snake_case
            $table->timestamps(); // This adds created_at and updated_at
            $table->year('academic_year')->nullable(); // Changed to snake_case
            $table->foreign('s_id')->references('id')->on('students')->onDelete('cascade'); // Ensure matching data types
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('std_placements'); // Ensure the table name matches
    }
};