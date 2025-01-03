<?php
// app/Http/Controllers/StdPlacementController.php
namespace App\Http\Controllers;

use App\Models\StdPlacement;
use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;

class StdPlacementController extends Controller
{
   
    // public function index()
    // {
    //     $placements = StdPlacement::with('student')->get();
    //     return view('stud_placements.index', compact('placements'));
    // }

    public function index()
    {
        $userType = session('userType');
        $username = session('username'); 

        if ($userType === 'Student') {
            $placements = StdPlacement::where('s_id', $username)->get();
        } else {
            $placements = StdPlacement::all();
        }

        return view('stud_placements.index', compact('placements', 'userType'));
    }

    // Show form for creating new placement
    public function create()
    {
        $students = Student::all(); // Fetch all students to associate with placement
        return view('stud_placements.create', compact('students'));
    }

    // Store a new placement
    public function store(Request $request)
    {
        $request->validate([
            's_id' => 'required|exists:students,id', // Validate that student exists
            'block' => 'nullable|string',
            'room' => 'nullable|string',
            'status' => 'nullable|string',
            'academic_year' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
        ]);

        StdPlacement::create($request->all());

        return redirect()->route('stud_placements.index')->with('success', 'stud_placements added successfully!');
    }

    // Show a single placement
    public function show($id)
    {
        $placement = StdPlacement::with('student')->findOrFail($id);
        return view('stud_placements.show', compact('placement'));
    }

    // Show form for editing a placement
    public function edit($id)
    {
        $placement = StdPlacement::findOrFail($id);
        $students = Student::all(); // Fetch all students
        return view('stud_placements.edit', compact('placement', 'students'));
    }

    // Update an existing placement
    public function update(Request $request, $id)
    {
        $request->validate([
            's_id' => 'required|exists:students,id', // Validate that student exists
            'block' => 'nullable|string',
            'room' => 'nullable|string',
            'status' => 'nullable|string',
            'academic_year' => 'nullable|year',
        ]);

        $placement = StdPlacement::findOrFail($id);
        $placement->update($request->all());

        return redirect()->route('stud_placements.index')->with('success', 'Placement updated successfully!');
    }

    // Delete a placement
    public function destroy($id)
    {
        $placement = StdPlacement::findOrFail($id);
        $placement->delete();

        return redirect()->route('stud_placements.index')->with('success', 'Placement deleted successfully!');
    }
}