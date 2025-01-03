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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('emp_id', 20)->primary(); // Changed to snake_case
            $table->string('status', 50)->nullable(); // Changed to snake_case
            $table->string('email', 255)->unique(); // Changed to snake_case
            $table->string('first_name', 100)->nullable(); // Changed to snake_case
            $table->string('second_name', 100)->nullable(); // Changed to snake_case
            $table->string('last_name', 100)->nullable(); // Changed to snake_case
            $table->string('gender', 10)->nullable(); // Changed to snake_case
            $table->year('entry_year');
            $table->string('password')->nullable();
            $table->string('address', 255)->nullable(); // Changed to snake_case
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees'); // Ensure the table name matches
    }
};