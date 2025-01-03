<?php

namespace App\Http\Controllers;

use App\Models\EmergencyDetail;
use Illuminate\Http\Request;

class EmergencyDetailController extends Controller
{
    public function index()
{
    $emergencyDetails = EmergencyDetail::all();
    return view('students.emergency-details.index', compact('emergencyDetails'));
}

public function create()
{
    return view('students.emergency-details.create');
}

    public function store(Request $request)
    {
        $request->validate([
            's_id' => 'required|exists:student,id',
            'contact_name' => 'required|string|max:255',
            'contact_relationship' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'description' => 'nullable|string',
        ]);

        EmergencyDetail::create($request->all());

        return redirect()->route('students.emergency-details.index')
                         ->with('success', 'Emergency detail created successfully.');
    }

    public function show(EmergencyDetail $emergencyDetail)
    {
        return view('students.emergency_details.show', compact('emergencyDetail'));
    }

    public function edit(EmergencyDetail $emergencyDetail)
    {
        return view('students.emergency_details.edit', compact('emergencyDetail'));
    }

    public function update(Request $request, EmergencyDetail $emergencyDetail)
    {
        $request->validate([
            's_id' => 'required|exists:student,id',
            'contact_name' => 'required|string|max:255',
            'contact_relationship' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'description' => 'nullable|string',
        ]);

        $emergencyDetail->update($request->all());

        return redirect()->route('students.emergency-details.index')
                         ->with('success', 'Emergency detail updated successfully.');
    }

    public function destroy(EmergencyDetail $emergencyDetail)
    {
        $emergencyDetail->delete();

        return redirect()->route('students.emergency-details.index')
                         ->with('success', 'Emergency detail deleted successfully.');
    }
}