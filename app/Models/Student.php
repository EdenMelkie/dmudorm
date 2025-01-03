<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';
    public $incrementing = false; // Non-incrementing primary key
    public $timestamps=false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'first_name',
        'second_name',
        'last_name',
        'email',
        'password',
        'entry_year',
        'department',
        'status',
        'gender',
        'disability',
        'address',
        'citizenship',
    ];

    protected $hidden = ['password']; // Hide password by default
}