<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class ProctorPlacement extends Model
{
    use HasFactory;

    protected $table = 'proctor_placements';
    protected $primaryKey = 'assign_id';

    // Allow mass assignment for these fields
    protected $fillable = [
        'emp_id',
        'year',
        'date',
        'attribute1',
    ];

    public $timestamps = false; // Disable Laravel's default timestamps if not in use

    // Define the relationship with Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'emp_id');
    }
}
