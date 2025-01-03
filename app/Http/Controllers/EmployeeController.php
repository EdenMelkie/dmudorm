<?php


namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    // Display a listing of employees

    public function index(Request $request)
    {
        // Check if the search parameter 'emp_id' is present in the query
        $searchId = $request->input('emp_id');

        // If there's a search ID, filter employees by that ID and eager load the related user data
        if ($searchId) {
            $employees = Employee::where('emp_id', $searchId)
                ->with('user') // Assuming 'user' is the relationship method on the Employee model
                ->get();
        } else {
            // If no search, show all employees and eager load the related user data
            $employees = Employee::with('user')->get();
        }

        // Return the employees view with the employees data, including userType
        return view('employees.index', compact('employees'));
    }

    // $employees = Employee::all();
    // return view('employees.index', compact('employees'));


    // Show the form for creating a new employee
    public function create()
    {
        return view('employees.create');
    }

    // Store a newly created employee in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'emp_id' => 'required|unique:users,username',
            'status' => 'required',
            'email' => 'required|email|unique:employees',
            'first_name' => 'required|string',
            'second_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'entry_year' => 'required|digits:4',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'address' => 'required|string',
        ]);

        Employee::create($validatedData);

        User::create([
            'username' => $validatedData['emp_id'],
            'password' => Hash::make($validatedData['password']), // Hashing the password
            'status' => 'Active',
            'userType' => $validatedData['role'],
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }


    // Show the form for editing an existing employee
    public function edit($emp_id)
    {
        $employee = Employee::findOrFail($emp_id);
        return view('employees.edit', compact('employee'));
    }

    // Update the specified employee in the database
    public function update(Request $request, $emp_id)
    {
        $employee = Employee::findOrFail($emp_id);

        $validated = $request->validate([
            'email' => 'required|email|unique:employees,email,' . $emp_id . ',emp_id',
            'first_name' => 'nullable|string|max:100',
            'second_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'gender' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }
    public function show($emp_id)
    {
        // Retrieve the employee record by emp_id
        $employee = Employee::findOrFail($emp_id);

        // Return a view or JSON response
        return view('employees.show', compact('employee'));
    }


    // Remove the specified employee from the database
    public function destroy($emp_id)
    {
        $employee = Employee::findOrFail($emp_id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}





















// namespace App\Http\Controllers;

// use App\Models\Employee;
// use Illuminate\Http\Request;

// class EmployeeController extends Controller
// {
//     // Display a listing of the employees.
//     public function index()
//     {
//         $employees = Employee::all();
//         return view('employees.index', compact('employees'));
//     }

//     // Show the form for creating a new employee.
//     public function create()
//     {
//         return view('employees.create');
//     }

//     // Store a newly created employee in the database.
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'emp_id' => 'required|unique:employees',
//             'email' => 'required|email|unique:employees',
//             'first_name' => 'required',
//             'second_name' => 'nullable',
//             'last_name' => 'nullable',
//             'gender' => 'nullable',
//             'address' => 'nullable',
//         ]);

//         Employee::create($validated);

//         return redirect()->route('employees.index')->with('success', 'Employee created successfully');
//     }

//     // Show the form for editing an existing employee.
//     public function edit($emp_id)
//     {
//         $employee = Employee::findOrFail($emp_id);
//         return view('employees.edit', compact('employee'));
//     }

//     // Update the specified employee in the database.
//     public function update(Request $request, $emp_id)
//     {
//         $employee = Employee::findOrFail($emp_id);

//         $validated = $request->validate([
//             'emp_id' => 'required|string|max:20|unique:employees,emp_id,' . $emp_id,
//             'email' => 'required|email|unique:employees,email,' . $emp_id,
//             'first_name' => 'nullable|string|max:100',
//             'second_name' => 'nullable|string|max:100',
//             'last_name' => 'nullable|string|max:100',
//             'gender' => 'nullable|string|max:10',
//             'address' => 'nullable|string|max:255',
//         ]);

//         $employee->update($validated);

//         return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
//     }

//     // Remove the specified employee from the database.
//     // public function destroy($emp_id)
//     // {
//     //     $employee = Employee::findOrFail($emp_id);
//     //     $employee->delete();

//     //     return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
//     // }

//     public function destroy(Employee $emp_id)
//     {
//         $emp_id->delete();

//         return redirect()->route('employees.index')
//                          ->with('success', 'Employee deleted successfully.');
//     }

//     // Display the employee details.
//     public function show($emp_id)
//     {
//         $employee = Employee::findOrFail($emp_id); // Retrieve the employee by emp_id
//         return view('employees.show', compact('employee')); // Pass employee data to the show view
//     }
// }

















// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use App\Models\Employee; // Assuming Employee model exists
// use App\Models\User; // Assuming User model exists
// use Illuminate\Support\Facades\Hash;

// class EmployeeController extends Controller
// {
//     public function showUploadForm()
//     {
//         return view('employees.add');
//     }

//     public function uploadFile(Request $request)
//     {
//         $request->validate([
//             'employeeFile' => 'required|mimes:csv,txt|max:2048', // Ensure it's a CSV or text file
//         ]);

//         $file = $request->file('employeeFile');
//         $fileData = file($file->getRealPath());

//         foreach ($fileData as $line) {
//             $data = str_getcsv($line); // Assuming CSV format with values in a specific order
//             [$emp_id, $email, $first_name, $second_name, $last_name, $gender, $address] = $data;

//             // Insert into `employee` table
//             $employee = Employee::create([
//                 'emp_id' => $emp_id,
//                 'email' => $email,
//                 'first_name' => $first_name,
//                 'second_name' => $second_name,
//                 'last_name' => $last_name,
//                 'gender' => $gender,
//                 'address' => $address,
//             ]);

//             // Insert into `users` table
//             User::create([
//                 'username' => $emp_id, // Using emp_id as username
//                 'email' => $email,
//                 'password' => Hash::make('defaultpassword'), // Set a default password
//                 'status' => 'Active',
//                 'userType' => 'Not Assigned',
//             ]);
//         }

//         return redirect()->back()->with('success', 'Employees registered successfully!');
//     }
// }