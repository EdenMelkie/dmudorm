<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // Fetch the user using Query Builder
        $user = DB::table('users')->where('username', $request->username)->first();


        // Check if the user exists and if the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Invalid username or password')->withInput();
        }

        // If authentication is successful, fetch the UserType and create a session for the user
        $userType = $user->userType;

        // Store user details in session
        Session::put('user_id', $user->username); // Use UserName as the user identifier
        Session::put('username', $user->username);
        Session::put('userType', $userType); //Admin

        // Redirect based on UserType
        switch ($userType) {
            case 'Admin':
                return redirect()->route('admin.dashboard');  // Redirect to admin dashboard
            case 'Proctor':
                return redirect()->route('proctor_placements.dashboard');  // Redirect to staff dashboard
            case 'Manager':
                return redirect()->route('manager.dashboard');  // Redirect to manager dashboard
            case 'Student':
                return redirect()->route('students.dashboard');  // Redirect to student dashboard
            default:
                return redirect()->route('home');  // Redirect to home
        }
    }

    public function logout(Request $request)
    {
        // Auth::logout(); // Log out the authenticated user
        Session::flush(); // Clear all session data
        Session::regenerate(); // Regenerate the session ID
        return redirect()->route('login');
    }
}