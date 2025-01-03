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
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('report_id'); // Changed to snake_case and made it the first column
            $table->string('proctor_id')->nullable(); // Changed to snake_case
            $table->string('student_id', 20)->nullable(); // Changed to snake_case
            $table->string('status', 50)->nullable(); // Changed to snake_case
            $table->date('date')->nullable(); // Changed to snake_case
            $table->text('comment')->nullable(); // Changed to snake_case
            $table->foreign('proctor_id')->references('emp_id')->on('employees')->onDelete('cascade'); // Ensure matching data types
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); // Ensure matching data types
            // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); // Ensure matching data types
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports'); // Ensure the table name matches
    }
};