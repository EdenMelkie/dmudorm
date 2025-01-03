<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    // Specify the table (optional if it follows the default convention)
    protected $table = 'blocks';

    // Specify the custom primary key
    protected $primaryKey = 'block_id';

    // Set the primary key type (integer by default)
    public $incrementing = false;

    // Define the columns that can be mass-assigned
    protected $fillable = 
    [
        'block_id',
        'block_type', 
        'capacity', 
        'reserved_for', 
        'disable_group', 
        'status'
    ];
}
