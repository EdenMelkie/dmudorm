<?php
// app/Http/Controllers/RoomController.php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Show the list of rooms (READ)
    public function index()
    {
        $rooms = Room::all(); // Fetch all rooms
        return view('rooms.index', compact('rooms'));
    }

    // Show the form to create a new room (CREATE)
    public function create()
    {
        return view('rooms.create');
    }

    // Store a new room in the database (STORE)
   // app/Http/Controllers/RoomController.php

public function store(Request $request)
{
    // Validate the room data
    $request->validate([
        'room_id' => 'required|string|max:255',
        'block' => 'exists:blocks,block_id', // Ensure block exists in the blocks table
        'status' => 'nullable|string|max:255',
        'capacity' => 'required|integer|min:1'
    ]);

    // Create the room and store it in the database
    Room::create([
        'room_id' => $request->room_id,
        'block_id' => $request->block_id, // Assuming 'block' refers to 'block_id'
        'status' => $request->status,
        'capacity' => $request->capacity,
    ]);

    // Redirect to the rooms list with a success message
    return redirect()->route('rooms.index')->with('success', 'Room created successfully');
}


    // Show the form to edit a specific room (EDIT)
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    // Update the room in the database (UPDATE)
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_id'=>'required|string|max:255',
            'block' => 'exists:blocks,block_id',
            'status' => 'nullable|string|max:255',
            'capacity' => 'required|integer|min:1'
        ]);

        $room->update($request->all()); // Update the room data in the database
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully');
    }

    // Show the details of a room (SHOW)
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    // Delete the room (DELETE)
    public function destroy(Room $room)
    {
        $room->delete(); // Delete the room
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully');
    }
}