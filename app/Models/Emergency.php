<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'emergencies'; 
    protected $primaryKey = 'emerg_id';

    protected $fillable = [
        's_id',
        'first_name',
        'second_name',
        'last_name',
        'address',
        'region',
        'zone',
        'woreda',
        'kebele',
        'phone',
    ];
}