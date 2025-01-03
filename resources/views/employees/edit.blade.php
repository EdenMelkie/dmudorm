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
    <h1 style="font-size: 2rem; margin-bottom: 20px; text-align: center;">Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->emp_id) }}" method="POST"
        style="max-width: 600px; margin: auto;">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label for="emp_id" style="display: block; font-weight: bold;">Emp ID:</label>
            <input type="text" name="emp_id" id="emp_id" value="{{ $employee->emp_id }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" readonly>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold;">Email:</label>
            <input type="email" name="email" id="email" value="{{ $employee->email }}" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="first_name" style="display: block; font-weight: bold;">First Name:</label>
            <input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="second_name" style="display: block; font-weight: bold;">Second Name:</label>
            <input type="text" name="second_name" id="second_name" value="{{ $employee->second_name }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="last_name" style="display: block; font-weight: bold;">Last Name:</label>
            <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="gender" style="display: block; font-weight: bold;">Gender:</label>
            <input type="text" name="gender" id="gender" value="{{ $employee->gender }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

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
            <label for="address" style="display: block; font-weight: bold;">Address:</label>
            <input type="text" name="address" id="address" value="{{ $employee->address }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="status" style="display: block; font-weight: bold;">Status:</label>
            <input type="text" name="status" id="status" value="{{ $employee->status }}"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <button type="submit"
            style="display: block; width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 16px;">
            Update
        </button>
    </form>
</div>
@endsection