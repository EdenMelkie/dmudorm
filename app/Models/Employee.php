<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'emp_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'emp_id',
        'status',
        'email',
        'first_name',
        'second_name',
        'last_name',
        'gender',
        'entry_year',
        'password',
        'address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'emp_id', 'username'); // Foreign key is 'emp_id', local key is 'username'
    }
}