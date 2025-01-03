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
    <title>Show Placement</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fa;
        padding: 20px;
    }

    h1 {
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }

    .placement-details {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 800px;
        margin: 0 auto;
    }

    .placement-details p {
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
    }

    .placement-details a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #5cb85c;
        color: white;
        border-radius: 4px;
        text-decoration: none;
        font-size: 16px;
    }

    .placement-details a:hover {
        background-color: #4cae4c;
    }
    </style>
</head>

<body>
    <div class="placement-details">
        <h1>Placement Details</h1>
        <p><strong>Student:</strong> {{ $placement->student->first_name }} {{ $placement->student->last_name }}</p>
        <p><strong>Block:</strong> {{ $placement->block }}</p>
        <p><strong>Room:</strong> {{ $placement->room }}</p>
        <p><strong>Status:</strong> {{ $placement->status }}</p>
        <p><strong>Academic Year:</strong> {{ $placement->academic_year }}</p>
        <a href="{{ route('stud_placements.index') }}">Back</a>
    </div>
</body>

</html>
@endsection