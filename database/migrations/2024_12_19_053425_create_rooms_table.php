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
        Schema::create('rooms', function (Blueprint $table) {
            $table->string('room_id'); // Changed to snake_case
            $table->string('block')->nullable(); // Allow block to be nullable
            $table->string('status')->nullable(); // Changed to snake_case and made nullable
            $table->integer('capacity'); // Changed to snake_case
            $table->foreign('block')->references('block_id')->on('blocks')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms'); // Ensure the table name matches
    }
};
