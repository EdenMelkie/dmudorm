<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |----------------------------------------------------------------------
    | Register Controller
    |----------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    protected function registered(Request $request, $user)
    {
        // Redirect based on UserType
        switch ($user->userType) {
            case 'Admin':
                return redirect()->route('admin.dashboard');
            case 'Manager':
                return redirect()->route('manager.dashboard');
            case 'Student':
                return redirect()->route('students.dashboard');
            case 'Proctor':
                return redirect()->route('proctor_placements.dashboard');
            default:
                return redirect('/'); // Fallback for unknown UserType
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'userType' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Create a new user with the provided data
        return User::create([
            'username' => $data['username'],  // Store UserName instead of email
            'userType' => $data['userType'],
            'password' => Hash::make($data['password']),
            'status' => 'Active',  // Set the user status to 'Active'
        ]);
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}