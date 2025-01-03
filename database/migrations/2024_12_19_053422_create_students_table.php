<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
{
    Schema::create('students', function (Blueprint $table) { // Changed from 'student' to 'students'
        $table->string('id', 20)->primary(); // Varchar ID as the primary key
        $table->string('first_name');
        $table->string('second_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('password');
        $table->year('entry_year');
        $table->string('department');
        $table->string('status')->default('active');
        $table->string('gender');
        $table->boolean('disability')->default(false);
        $table->text('address')->nullable();
        $table->string('citizenship');
        $table->timestamps(); // Adds created_at and updated_at
    });
}


    public function down()
    {
        Schema::dropIfExists('students');
    }
}