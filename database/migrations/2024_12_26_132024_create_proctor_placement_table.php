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
        Schema::create('proctor_placements', function (Blueprint $table) {
            $table->increments('assign_id'); // Primary key for proctor placements
            $table->string('emp_id'); // Use unsignedBigInteger for the foreign key
            $table->year('year')->nullable(); 
            $table->date('date')->nullable(); 
            $table->string('attribute1', 255)->nullable(); 

            // Foreign key constraint to the employee table
            $table->foreign('emp_id')
                  ->references('emp_id') // Reference the EmpId in the employee table
                  ->on('employees') // Ensure the table name is correct (case-sensitive)
                  ->onDelete('cascade'); // Cascade on delete
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proctor_placements');
    }
};

