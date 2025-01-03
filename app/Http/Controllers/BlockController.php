<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlockController extends Controller
{
    // Display a listing of the blocks.


     
    public function index()
    {
        $blocks = Block::all();
        return view('blocks.index', compact('blocks'));
    }

    // public function index()
    // {
    //     $userType = session('userType');
    //     $username = session('username'); 

    //     if ($userType === 'Student') {
    //         $requests = Block::where('block_id', $username)->get();
    //     }
    //     //  elseif($userType === 'Proctor')
    //     // {
    //     //     $requests = Block::where('emp_id', $username)->get();

    //     // }
    //     else
    //     {
    //         $requests = Block::all();
    //     }
        

    //     return view('requests.index', compact('requests', 'userType'));
    // }

    // Show the form for creating a new block.
    public function create()
    {
        return view('blocks.create');
    }

    // Store a newly created block in storage.
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'block_id' => 'required|string|max:255',
            'block_type' => 'required|string',
            'capacity' => 'required|integer',
            'reserved_for' => 'nullable|string',
            'status' => 'required|string',
        ]);

        // Create a new Block
        Block::create([
            'block_id' => $request->block_id,
            'block_type' => $request->block_type,
            'capacity' => $request->capacity,
            'reserved_for' => $request->reserved_for,
            'status' => $request->status,
        ]);

        // Redirect or return a response
        return redirect()->route('blocks.index')->with('success', 'Block created successfully');
    }

    // Display the specified block.
    public function show($id)
    {
        $block = Block::findOrFail($id);
        return view('blocks.show', compact('block'));
    }

    // Show the form for editing the specified block.
    public function edit($id)
    {
        $block = Block::findOrFail($id);
        return view('blocks.edit', compact('block'));
    }

    // Update the specified block in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'block_id' => 'required|string|max:255',
            'block_type' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'reserved_for' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $block = Block::findOrFail($id);
        $block->update($request->all());

        return redirect()->route('blocks.index')->with('success', 'Block updated successfully.');
    }

    // Remove the specified block from storage.
    public function destroy($id)
    {
        $block = Block::findOrFail($id);
        $block->delete();

        return redirect()->route('blocks.index')->with('success', 'Block deleted successfully.');
    }
}