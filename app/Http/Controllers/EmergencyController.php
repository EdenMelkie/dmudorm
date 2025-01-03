<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use App\Models\User;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    // public function index()
    // {
    //     $emergencies = Emergency::all();
    //     return view('emergencies.index', compact('emergencies'));
    // }

    public function index()
    {
        $userType = session('userType');
        $username = session('username'); 

        if ($userType === 'Student') {
            $emergencies = Emergency::where('s_id', $username)->get();
        } else {
            $emergencies = Emergency::all();
        }

        return view('emergencies.index', compact('emergencies', 'userType'));
    }

    public function create()
    {
        return view('emergencies.create');
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         's_id' => 'required|string|max:20|exists:students,id',
    //         'first_name' => 'nullable|string|max:100',
    //         'second_name' => 'nullable|string|max:100',
    //         'last_name' => 'nullable|string|max:100',
    //         'address' => 'nullable|string|max:255',
    //         'region' => 'nullable|string|max:100',
    //         'zone' => 'nullable|string|max:100',
    //         'woreda' => 'nullable|string|max:100',
    //         'kebele' => 'nullable|string|max:100',
    //         'phone' => 'nullable|string|max:20',
    //         'role' => 'required|string|max:50',  // Ensure role is provided
    //     ]);
    
    //     // Check if student exists (already validated in the validation rule)
    //     $student = \App\Models\Student::find($request->s_id);
    
    //     Emergency::create($request->only([
    //         's_id', 'first_name', 'second_name', 'last_name',
    //         'address', 'region', 'zone', 'woreda', 'kebele', 'phone'
    //     ]));
    
    //     // Create the user associated with the emergency
    //     User::create([
    //         'username' => $request['s_id'],      // Use s_id as username
    //         'password' => bcrypt('defaultpassword'),  // Set a default password or use a more secure one
    //         'status' => 'Active',
    //         'userType' => $request['role'],      // Set role from the request
    //     ]);
    
    //     return redirect()->route('emergencies.index')->with('success', 'Record added successfully.');
    // }
        

    

    public function store(Request $request)
    {
        $request->validate([
            's_id' => 'required|string|max:20',
            'first_name' => 'nullable|string|max:100',
            'second_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:100',
            'zone' => 'nullable|string|max:100',
            'woreda' => 'nullable|string|max:100',
            'kebele' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
        ]);

        Emergency::create($request->all());

        User::create([
            'username' => $request['s_id'],       // Use the emp_id as username
            'password' => bcrypt('defaultpassword'),   // Use a default password
            'status' => 'Active',             // Set status to Active
            'userType' => $request['role'],  // Set userType based on the employee's role
        ]);
        return redirect()->route('emergencies.index')->with('success', 'Record added successfully.');
    }

    public function show(Emergency $emergency)
    {
        $emergency = Emergency::find($emergency);

        return view('emergencies.show', compact('emergency'));
    }

    public function edit(Emergency $emergency)
    {
        return view('emergencies.edit', compact('emergency'));
    }


    public function update(Request $request, Emergency $emergency)
    {
        $request->validate([
            's_id' => 'required|string|max:20',
            'first_name' => 'nullable|string|max:100',
            'second_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:100',
            'zone' => 'nullable|string|max:100',
            'woreda' => 'nullable|string|max:100',
            'kebele' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
        ]);

      


        $emergency->update($request->all());
        return redirect()->route('emergencies.index')->with('success', 'Record updated successfully.');
    }

    public function destroy(Emergency $emergency)
    {
        $emergency->delete();
        return redirect()->route('emergencies.index')->with('success', 'Record deleted successfully.');
    }
}