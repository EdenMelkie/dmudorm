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
    <title>Create Placement</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-top: 20px;
    }

    .form-container {
        max-width: 600px;
        margin: 40px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-container label {
        font-weight: bold;
        margin-top: 12px;
        margin-bottom: 6px;
        display: block;
        font-size: 14px;
        color: #555;
    }

    .form-container input[type="text"],
    .form-container select {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .form-container button {
        width: 100%;
        padding: 12px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-container button:hover {
        background-color: #0056b3;
    }

    .form-container input[type="text"]:focus,
    .form-container select:focus {
        border-color: #007BFF;
        outline: none;
    }

    .form-container .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .form-container {
            margin: 20px;
            padding: 15px;
        }

        .form-container input[type="text"],
        .form-container select {
            padding: 10px;
            font-size: 13px;
        }

        .form-container button {
            padding: 10px;
            font-size: 14px;
        }
    }
    </style>
</head>

<body>
    <h1>Create Placement</h1>
    <div class="form-container">
        <form action="{{ route('stud_placements.store') }}" method="POST">
            @csrf

            <label for="s_id">Student:</label>
            <select name="s_id" id="s_id">
                @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                @endforeach
            </select>

            <label for="block">Block:</label>
            <input type="text" name="block" id="block" value="{{ old('block') }}">

            @error('block')
            <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="room">Room:</label>
            <input type="text" name="room" id="room" value="{{ old('room') }}">

            @error('room')
            <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="{{ old('status') }}">

            @error('status')
            <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="academic_year">Academic Year:</label>
            <input type="text" name="academic_year" id="academic_year" value="{{ old('academic_year') }}">

            @error('academic_year')
            <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit">Save</button>
        </form>
    </div>
</body>

</html>

@endsection