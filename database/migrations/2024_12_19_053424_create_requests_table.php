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
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('request_id'); // Changed to snake_case
            $table->string('student_id', 20); // Changed to snake_case
            $table->date('date')->nullable(); // Changed to snake_case
            $table->string('status', 50)->nullable(); // Changed to snake_case
            $table->text('comment')->nullable(); // Changed to snake_case
            $table->string('purpose', 255)->nullable(); // Changed to snake_case
            $table->text('reason')->nullable(); // Changed to snake_case
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); // Ensure matching data types
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests'); // Ensure the table name matches
    }
};
