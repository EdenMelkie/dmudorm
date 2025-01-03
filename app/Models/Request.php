<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $primaryKey = 'request_id'; // Custom primary key
    public $timestamps = false; // If you do not use timestamps

    protected $fillable = [
        'student_id',
        'date',
        'status',
        'comment',
        'purpose',
        'reason',
    ];

    // Define the relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    
}
