<?php













namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Student;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    public function index()
    {
        $userType = session('userType');
        $username = session('username'); 

        if ($userType === 'Student') {
            $requests = Request::where('student_id', $username)->get();
        } else {
            $requests = Request::all();
        }

        return view('requests.index', compact('requests', 'userType'));
    }

    public function create()
    {
        $username = session('username');
        $student = Student::where('id', $username)->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Student record not found.');
        }

        return view('requests.create', ['user' => $student->id]);
    }

    public function store(HttpRequest $request)
    {
        $studentId = trim(session('username'));

        if (!Student::where('id', $studentId)->exists()) {
            return redirect()->back()
                ->with('error', 'The student ID from the session does not exist.')
                ->withInput();
        }

        $validatedData = $request->validate([
            'date' => 'required|date',
            'status' => 'nullable|string',
            'comment' => 'nullable|string|max:255',
            'purpose' => 'nullable|string|max:255',
            'reason' => 'nullable|string|max:255',
        ]);

        $validatedData['student_id'] = $studentId;
        $validatedData['status'] = $validatedData['status'] ?? 'Pending';

        Request::create($validatedData);

        return redirect()->route('requests.index')
            ->with('success', 'Request has been successfully created.');
    }

    public function edit($id)
    {
        $request = Request::findOrFail($id);
        $students = Student::all();
        return view('requests.edit', compact('request', 'students'));
    }

    public function update(HttpRequest $request, $id)
    {
        $validated = $request->validate([
            'student_id' => 'required|string|max:20',
            'date' => 'required|date',
            'status' => 'nullable|string|max:50',
            'comment' => 'nullable|string',
            'purpose' => 'nullable|string|max:255',
            'reason' => 'nullable|string',
        ]);

        $requestToUpdate = Request::findOrFail($id);
        $requestToUpdate->update($validated);

        return redirect()->route('requests.index')->with('success', 'Request updated successfully!');
    }

    public function show($request_id)
    {
        $request = Request::findOrFail($request_id);
        return view('requests.show', compact('request'));
    }

    public function destroy($id)
    {
        $request = Request::findOrFail($id);
        $request->delete();

        return redirect()->route('requests.index')->with('success', 'Request deleted successfully!');
    }

    public function approve($id)
    {
        $request = Request::findOrFail($id);
        $request->status = 'Approved';
        $request->save();

        return redirect()->route('requests.index')->with('success', 'Request approved.');
    }
}



















// namespace App\Http\Controllers;

// use App\Models\Request;
// use App\Models\Student;
// use App\Models\User;
// use Illuminate\Http\Request as HttpRequest;
// use Illuminate\Support\Facades\DB;

// class RequestController extends Controller
// {
//     // Display all requests
   

// public function index()
// {
//     $userType = session('userType');
//     $username = session('username'); // Fetch the logged-in user's username

//     if ($userType === 'Student') {
//         // Filter requests where the student_id matches the logged-in username
//         $requests = Request::where('student_id', $username)->get();
//     } else {
//         // For other roles (Admin, Manager, etc.), fetch all requests
//         $requests = Request::all();
//     }

//     return view('requests.index', compact('requests', 'userType'));
// }




//     public function create()
//     {
//         // Get the current session username
//         $username = session('username');

//         // Find the associated student record by username
//         $student = Student::where('id', $username)->first();

//         if (!$student) {
//             return redirect()->back()->with('error', 'Student record not found.');
//         }

//         return view('requests.create', ['user' => $student->id]); // Pass the student ID to the view
//     }



    
//     public function store(Request $request)
// {
//     // Retrieve the student ID from the session
//     $studentId = trim(session('username'));

//     // Check if the student ID exists in the database
//     if (!Student::where('id', $studentId)->exists()) {
//         // Redirect back with an error if the student ID does not exist
//         return redirect()->back()
//             ->with('error', 'The student ID from the session does not exist.')
//             ->withInput();
//     }

//     // Validate the incoming request
//     $validatedData = $request->validate([
//         'date' => 'required|date',
//         'status' => 'nullable|string',
//         'comment' => 'nullable|string|max:255',
//         'purpose' => 'nullable|string|max:255',
//         'reason' => 'nullable|string|max:255',
//     ]);

//     // Ensure the student ID from the session is used
//     $validatedData['student_id'] = $studentId;
//     $validatedData['status'] = $validatedData['status'] ?? 'Pending';

//     // Store the validated data into the requests table
//     Request::create($validatedData);

//     // Redirect to the index page with a success message
//     return redirect()->route('requests.index')
//         ->with('success', 'Request has been successfully created.');
// }

   

       


//     // Show the form for editing a specific request
//     public function edit($id)
//     {
//         $request = Request::findOrFail($id); // Find the request by ID
//         $students = Student::all(); // Get all students for the dropdown
//         return view('requests.edit', compact('request', 'students'));
//     }

//     // Update a specific request
//     public function update(HttpRequest $request, $id)
//     {
//         $validated = $request->validate([
//             'student_id' => 'required|string|max:20',
//             'date' => 'required|date',
//             'status' => 'nullable|string|max:50',
//             'comment' => 'nullable|string',
//             'purpose' => 'nullable|string|max:255',
//             'reason' => 'nullable|string',
//         ]);

//         $requestToUpdate = Request::findOrFail($id);
//         $requestToUpdate->update($validated);

//         return redirect()->route('requests.index')->with('success', 'Request updated successfully!');
//     }
//     public function show($request_id)
//     {
//         $request = Request::findOrFail($request_id);
//         return view('requests.show', compact('request'));
//     }


//     // Delete a specific request
//     public function destroy($id)
//     {
//         $request = Request::findOrFail($id);
//         $request->delete();

//         return redirect()->route('requests.index')->with('success', 'Request deleted successfully!');
//     }

//     public function approve($id)
//     {
//         // Logic to approve the request
//         $request = Request::findOrFail($id);
//         $request->status = 'Approved'; // or whatever logic you need
//         $request->save();

//         return redirect()->route('requests.index')->with('success', 'Request approved.');
//     }
// }