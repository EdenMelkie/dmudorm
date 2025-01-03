<?php
// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Display a listing of the reports
    // public function index()
    // {
    //     $reports = Report::all();
    //     return view('reports.index', compact('reports'));
    // }

    public function index()
    {
        $userType = session('userType');
        $username = session('username'); 

        if ($userType === 'Student') {
            $reports = Report::where('student_id', $username)->get();
        } 
        
        elseif ($userType === 'Proctor') {
            $reports = Report::where('proctor_id', $username)->get();
        }
        else 
        
        {
            $reports = Report::all();
        }

        return view('reports.index', compact('reports', 'userType'));
    }

    // Show the form for creating a new report
    public function create()
    {
        return view('reports.create');
    }

    // Store a newly created report in the database
    public function store(Request $request)
    {
        $request->validate([
            'proctor_id' => 'required_without:student_id|exists:employees,emp_id', // Proctor ID is required if Student ID is not provided
            'student_id' => 'required_without:proctor_id|exists:students,id', // Student ID is required if Proctor ID is not provided
            'status' => 'nullable|string|max:50',
            'date' => 'required|date',
        ]);


        Report::create($request->all());

        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }

    // Display the specified report
    public function show($report_id)
    {
        $report = Report::findOrFail($report_id);
        return view('reports.show', compact('report'));
    }

    // Show the form for editing the specified report
    public function edit($report_id)
    {
        $report = Report::findOrFail($report_id);
        return view('reports.edit', compact('report'));
    }

    // Update the specified report in the database
    public function update(Request $request, $report_id)
    {
        $request->validate([
            'proctor_id' => 'required',
            'student_id' => 'required',
            'status' => 'nullable|string|max:50',
        ]);

        $report = Report::findOrFail($report_id);
        $report->update($request->all());

        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }

    // Remove the specified report from the database
    public function destroy($report_id)
    {
        $report = Report::findOrFail($report_id);
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }
}