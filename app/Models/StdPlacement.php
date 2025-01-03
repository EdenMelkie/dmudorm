<?php
// app/Models/StdPlacement.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StdPlacement extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow Laravel's convention
    protected $table = 'std_placements';
    protected $primaryKey = 'assign_id'; // Custom primary key

    public $timestamps = false;
    // Define the fillable fields to prevent mass-assignment vulnerabilities
    protected $fillable = [
        's_id',
        'block',
        'room',
        'status',
        'academic_year'
    ];

    // Define the relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 's_id', 'id');
    }
}