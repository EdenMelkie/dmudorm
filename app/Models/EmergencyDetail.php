<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        's_id',
        'contact_name',
        'contact_relationship',
        'contact_phone',
        'description',
    ];
}
