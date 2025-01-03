<?php
// app/Models/Report.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $primaryKey = 'report_id';  // Define custom primary key
    protected $fillable = ['proctor_id', 'student_id', 'status','date','comment'];

    // Define relationships if needed (e.g., Proctor and Student relationships)
}