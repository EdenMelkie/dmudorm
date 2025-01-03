<?php
// app/Models/Room.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Define the table name and primary key explicitly
    protected $table = 'rooms';
    protected $primaryKey = 'room_id'; // Set the primary key to room_id

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'room_id',
        'block',
        'status',
        'capacity'
    ];
// In Room model
public function block()
{
    return $this->belongsTo(Block::class, 'block_id');
}

    // If you are using non-incrementing primary key, set the following property
    public $incrementing = false; // By default this is true, so it's not necessary to add unless using a non-incrementing primary key.
}


