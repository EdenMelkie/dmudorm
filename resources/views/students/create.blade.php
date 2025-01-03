@php
$userType = session('userType');
$layout = match ($userType) {
'Admin' => 'layouts.appadd',
'Student' => 'layouts.appstd',
'Manager' => 'layouts.appman',
'Proctor' => 'layouts.appproc',
default => 'layouts.invalid',
};
@endphp

@extends($layout)


@section('content')

@error('field_name')
<small class="text-danger">{{ $message }}</small>
@enderror
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    /* resources/css/custom.css */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fa;
        padding-top: 20px;
    }

    .container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 800px;
        margin: 0 auto;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .form-control {
        border-radius: 4px;
        border: 1px solid #ccc;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        color: #333;
    }

    .form-control:focus {
        border-color: #5cb85c;
        outline: none;
    }

    textarea.form-control {
        height: 100px;
    }

    select.form-control {
        height: 40px;
    }

    button[type="submit"] {
        background-color: #5cb85c;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        border-radius: 4px;
    }

    button[type="submit"]:hover {
        background-color: #4cae4c;
    }

    small.text-danger {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
    }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Add New Student</h1>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">Student ID</label>
                <input type="text" class="form-control" name="id" value="{{ old('id') }}" required>
                @error('id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                @error('first_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="second_name">Second Name</label>
                <input type="text" class="form-control" name="second_name" value="{{ old('second_name') }}" required>
                @error('second_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                @error('last_name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="entry_year">Entry_Year</label>
                <input type="text" class="form-control" name="entry_year" value="{{ old('entry_year') }}" required>
                @error('entry_year')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" name="department" value="{{ old('department') }}" required>
                @error('department')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
                @error('status')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group"><label for="gender">Gender</label><select class="form-control" name="gender"
                    required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                @error('gender')
                <small class=" text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group"><label for="disability">Disability</label><select class="form-control"
                    name="disability" required>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>

                @error('disability')
                <small class=" text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                @error('address')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group"><label for="citizenship">Citizenship</label><input type="text" class="form-control"
                    name="citizenship" required>
            </div>
            <button type="submit" class="btn btn-success">Add Student</button>
        </form>
    </div>
</body>

</html>@endsection