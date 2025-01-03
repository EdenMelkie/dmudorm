<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;



class StudentController extends Controller
{





    public function search(Request $request)
    {
        $searchId = $request->input('id'); // Get the 'id' parameter from the query string

        if ($searchId) {
            // If 'id' is provided, filter students by ID
            $students = Student::where('id', $searchId)->get();
        } else {
            // If no search criteria, fetch all students
            $students = Student::all();
        }

        return view('students.index', compact('students', 'searchId')); // Pass the search ID to the view
    }





    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new StudentsImport, $request->file('excel_file'));
            return redirect()->route('students.index')->with('success', 'Students imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an issue importing the file. ' . $e->getMessage());
        }
    }

    // In StudentController.php




    public function index()
    {
        $userType = session('userType');
        $username = session('username');

        if ($userType === 'Student') {
            $students = Student::where('id', $username)->get();
        } else {
            $students = Student::all();
        }

        return view('students.index', compact('students', 'userType'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function register(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:20|unique:students,id',
            'first_name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:8',
            'entry_year' => 'required|digits:4',
            'department' => 'required|string|max:255',
            'status' => 'required|string',
            'gender' => 'required|string',
            'disability' => 'required|boolean',
            'address' => 'nullable|string',
            'citizenship' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        Student::create($data);

        // Insert the user record into the 'users' table
        User::create([
            'username' => $data['id'],       // Use the student ID as username
            'password' => $data['password'],  // Store the hashed password
            'status' => 'Active',             // Set status to Active
            'userType' => 'Student',          // Set userType to Student
        ]);


        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:20|unique:students,id',
            'first_name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:8',
            'entry_year' => 'required|digits:4',
            'department' => 'required|string|max:255',
            'status' => 'required|string',
            'gender' => 'required|string',
            'disability' => 'required|boolean',
            'address' => 'nullable|string',
            'citizenship' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        Student::create($data);

        // Insert the user record into the 'users' table
        User::create([
            'username' => $data['id'],       // Use the student ID as username
            'password' => $data['password'],  // Store the hashed password
            'status' => 'Active',             // Set status to Active
            'userType' => 'Student',          // Set userType to Student
        ]);


        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'entry_year' => 'required|digits:4',
            'department' => 'required|string|max:255',
            'status' => 'required|string',
            'gender' => 'required|string',
            'disability' => 'required|boolean',
            'address' => 'nullable|string',
            'citizenship' => 'required|string|max:255',
        ]);

        $student->update($request->except('password'));

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
