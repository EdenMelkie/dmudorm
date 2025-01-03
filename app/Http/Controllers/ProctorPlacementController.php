<?php 
namespace App\Http\Controllers;
use App\Models\ProctorPlacement;
use Illuminate\Http\Request;
use App\Models\User;

class ProctorPlacementController extends Controller
{
// Display all records
// public function index()
// {
// $proctorPlacements = ProctorPlacement::all();
// return view('proctor_placements.index', compact('proctorPlacements'));
// }


public function index()
    {
        $userType = session('userType');
        $username = session('username'); 

        if ($userType === 'Proctor') {
            $proctorPlacements = ProctorPlacement::where('emp_id', $username)->get();
        } else {
            $proctorPlacements = ProctorPlacement::all();
        }

        return view('proctor_placements.index', compact('proctorPlacements', 'userType'));
    }
// Show form for creating a new record
public function create()
{
return view('proctor_placements.create');
}

// Store a new record
public function store(Request $request)
{
$validated = $request->validate([
'emp_id' => 'required|string|max:255|unique:users,username', // Check if emp_id is unique
'year' => 'nullable|digits:4',
'date' => 'nullable|date',
'attribute1' => 'nullable|string|max:255',
'role' => 'required|string',
]);

// Create the ProctorPlacement record
ProctorPlacement::create($validated);

// Check if the user with the given emp_id already exists
$user = User::where('username', $validated['emp_id'])->first();

if (!$user) {
// If the user doesn't exist, create a new one
User::create([
'username' => $validated['emp_id'],
'password' => bcrypt('defaultpassword'), // Default password
'status' => 'Active',
'userType' => $validated['role'],
]);
}

return redirect()->route('proctor_placements.index')
->with('success', 'Proctor placement created successfully.');
}

// Display a specific record
public function show($assign_id)
{
$proctorPlacement = ProctorPlacement::with('employee')->where('assign_id', $assign_id)->firstOrFail();

// Pass both the ProctorPlacement and Employee to the view
return view('proctor_placements.show', [
'proctorPlacement' => $proctorPlacement,
'employee' => $proctorPlacement->employee, // Assuming the 'employee' relationship exists
]);
}

// Show form for editing a specific record
public function edit(ProctorPlacement $proctorPlacement)
{
return view('proctor_placements.edit', compact('proctorPlacement'));
}

// Update a specific record
public function update(Request $request, ProctorPlacement $proctorPlacement)
{
$validated = $request->validate([
'emp_id' => 'required|string|max:255',
'year' => 'nullable|digits:4',
'date' => 'nullable|date',
'attribute1' => 'nullable|string|max:255',
]);

$proctorPlacement->update($validated);

return redirect()->route('proctor_placements.index')
->with('success', 'Proctor placement updated successfully.');
}

// Delete a specific record
public function destroy(ProctorPlacement $proctorPlacement)
{
$proctorPlacement->delete();

return redirect()->route('proctor_placements.index')
->with('success', 'Proctor placement deleted successfully.');
}
}