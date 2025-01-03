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
        Schema::create('users', function (Blueprint $table) {
            $table->string('username', 255)->unique()->default('Eden'); // Changed to snake_case
            $table->string('password'); // Password should be hashed before storage
            $table->string('userType')->default('Student'); // Adjust default value if needed
            $table->string('status', 50)->default('Active'); // Changed to snake_case
            $table->timestamps(); // Add timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
