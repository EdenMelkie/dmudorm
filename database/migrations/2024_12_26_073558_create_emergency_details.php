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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->increments('emerg_id'); // Changed to snake_case
            $table->string('s_id', 20); // Changed to snake_case
            $table->string('first_name', 100)->nullable(); // Changed to snake_case
            $table->string('second_name', 100)->nullable(); // Changed to snake_case
            $table->string('last_name', 100)->nullable(); // Changed to snake_case
            $table->string('address', 255)->nullable(); // Changed to snake_case
            $table->string('region', 100)->nullable(); // Changed to snake_case
            $table->string('zone', 100)->nullable(); // Changed to snake_case
            $table->string('woreda', 100)->nullable(); // Changed to snake_case
            $table->string('kebele', 100)->nullable(); // Changed to snake_case
            $table->string('phone', 20)->nullable(); // Changed to snake_case
            $table->foreign('s_id')->references('id')->on('students')->onDelete('cascade'); // Ensure matching data types
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};
