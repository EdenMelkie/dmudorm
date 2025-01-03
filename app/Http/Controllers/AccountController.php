<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function register(Request $request)
    {
          $request->validate([
            'UserName' => 'required|string|max:255',
            'UserType' => 'required|string|max:255',
            'Status' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',

        ]);

        $student = Student::create([
            'UserName' => $request->UserName,
            'UserType' => $request->UserType,
            'Status' => $request->Status,
            'password' => Hash::make($request->password),

        ]);

        return response()->json([
            'message' => 'Account Created successfully!',
            'student' => $student
        ], 201);
    }
}