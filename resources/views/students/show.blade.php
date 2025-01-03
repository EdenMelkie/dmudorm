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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details of {{ $student->first_name }} {{ $student->last_name }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 100 auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #007bff;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        color: #555;
    }

    p {
        margin: 0;
        padding: 5px;
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-weight: bold;
    }

    .btn:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Student Details</h1>
        <div class="form-group">
            <label for="id">@lang('Student ID')</label>
            <p>{{ $student->id ?? 'N/A' }}</p>
        </div>
        <div class="form-group">
            <label for="first_name">First Name</label>
            <p>{{ $student->first_name }}</p>
        </div>
        <div class="form-group">
            <label for="second_name">Second Name</label>
            <p>{{ $student->second_name }}</p>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <p>{{ $student->last_name }}</p>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <p>{{ $student->email }}</p>
        </div>
        <div class="form-group">
            <label for="entry_year">Entry Year</label>
            <p>{{ $student->entry_year }}</p>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <p>{{ $student->department }}</p>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <p>{{ $student->status }}</p>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <p>{{ $student->gender }}</p>
        </div>
        <div class="form-group">
            <label for="disability">Disability</label>
            <p>{{ $student->disability ? 'Yes' : 'No' }}</p>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <p>{{ $student->address }}</p>
        </div>
        <div class="form-group">
            <label for="citizenship">Citizenship</label>
            <p>{{ $student->citizenship }}</p>
        </div>
        <a href="{{ route('students.index') }}" class="btn btn-secondary" aria-label="Back to Student List">Back to
            Student List</a>
    </div>
</body>

</html>

@endsection