@php
$userType = session('userType');
$layout = match ($userType) {
'Admin' => 'layouts.appadd',
'Student' => 'layouts.appstd',
'Manager' => 'layouts.appman',
'Proctor' => 'layouts.appproc',
default => 'layouts.app',
};
@endphp

@extends($layout)

@section('content')
<div class="container">
    <h1 style="font-size: 2rem; margin-bottom: 20px; text-align: center;">Add Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST" style="max-width: 600px; margin: auto;">
        @csrf
        <!-- Emp ID -->
        <div style="margin-bottom: 15px;">
            <label for="emp_id" style="display: block; font-weight: bold;">Emp ID:</label>
            <input type="text" name="emp_id" id="emp_id" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- Status -->
        <div style="margin-bottom: 15px;">
            <label for="status" style="display: block; font-weight: bold;">Status:</label>
            <select name="status" id="status" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="">-- Select Status --</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>

        <!-- Email -->
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold;">Email:</label>
            <input type="email" name="email" id="email" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- First Name -->
        <div style="margin-bottom: 15px;">
            <label for="first_name" style="display: block; font-weight: bold;">First Name:</label>
            <input type="text" name="first_name" id="first_name"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- Second Name -->
        <div style="margin-bottom: 15px;">
            <label for="second_name" style="display: block; font-weight: bold;">Second Name:</label>
            <input type="text" name="second_name" id="second_name"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- Last Name -->
        <div style="margin-bottom: 15px;">
            <label for="last_name" style="display: block; font-weight: bold;">Last Name:</label>
            <input type="text" name="last_name" id="last_name"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- Gender -->
        <div style="margin-bottom: 15px;">
            <label for="gender" style="display: block; font-weight: bold;">Gender:</label>
            <select name="gender" id="gender"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="">-- Select Gender --</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="entry_year" style="display: block; font-weight: bold;">Entry Year:</label>
            <input type="text" name="entry_year" id="entry_year"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <!-- <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: bold;">Password:</label>
            <input type="password" name="password" id="password"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div> -->

        <!-- Role -->
        <div style="margin-bottom: 15px;">
            <label for="role" style="display: block; font-weight: bold;">Role:</label>
            <select name="role" id="role"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="">-- Select role --</option>
                <option value="Admin">Admin</option>
                <option value="Manager">Manager</option>
                <option value="Proctor">Proctor</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: bold;">Password:</label>
            <input type="password" name="password" id="password" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- Address -->
        <div style="margin-bottom: 15px;">
            <label for="address" style="display: block; font-weight: bold;">Address:</label>
            <textarea name="address" id="address" rows="4"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
        </div>


        <!-- Submit Button -->
        <button type="submit"
            style="display: block; width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 5px; font-size: 16px;">
            Register
        </button>
    </form>
</div>
@endsection