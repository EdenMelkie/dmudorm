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
        Schema::create('blocks', function (Blueprint $table) {
            $table->string('block_id')->primary(); // Use this if 'block_id' is the primary key
            $table->string('block_type'); // Changed to snake_case
            $table->integer('capacity'); // Changed to snake_case
            $table->string('reserved_for')->nullable(); // Changed to snake_case and made nullable
            $table->boolean('disable_group')->default(false); // Changed to snake_case and set default value
            $table->string('status'); // Changed to snake_case
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocks'); // Ensure the table name matches
    }
};
