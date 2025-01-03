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
    <title>Placements</title>
    <style>
    /* resources/css/custom.css */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fa;
        padding-top: 20px;
        margin: 0;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 1000px;
        margin: 0 auto;
    }

    a {
        color: #5cb85c;
        text-decoration: none;
        margin-bottom: 20px;
        display: inline-block;
        font-size: 16px;
    }

    a:hover {
        text-decoration: underline;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #5cb85c;
        color: white;
    }

    table td a {
        color: #007bff;
        margin-right: 10px;
    }

    table td a:hover {
        text-decoration: underline;
    }

    table td form button {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    table td form button:hover {
        background-color: #c0392b;
    }

    /* Styling for the action buttons container */
    .action-buttons {
        text-align: center;
    }

    /* Common styles for all buttons */
    .action-buttons a,
    .action-buttons button {
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        margin: 0 5px;
        cursor: pointer;
        display: inline-block;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    /* View Button */
    .view-btn {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
    }

    .view-btn:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    /* Edit Button */
    .edit-btn {
        background-color: #ffc107;
        color: white;
        border: 1px solid #ffc107;
    }

    .edit-btn:hover {
        background-color: #e0a800;
        transform: translateY(-2px);
    }

    /* Delete Button */
    .delete-btn {
        background-color: #dc3545;
        color: white;
        border: 1px solid #dc3545;
    }

    .delete-btn:hover {
        background-color: #c82333;
        transform: translateY(-2px);
    }

    /* Optional: Add a confirmation dialog before delete */
    .delete-btn:active {
        background-color: #a71d2a;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>All Placements</h1>
        @if ($userType=='Manager')
        <a href="{{ route('stud_placements.create') }}">Add New Placement</a>

        @endif
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Block</th>
                    <th>Room</th>
                    <th>Status</th>
                    <th>Academic Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($placements as $placement)
                <tr>
                    <td>{{ $placement->student->first_name }} {{ $placement->student->second_name }}</td>
                    <td>{{ $placement->block }}</td>
                    <td>{{ $placement->room }}</td>
                    <td>{{ $placement->status }}</td>
                    <td>{{ $placement->academic_year }}</td>
                    <td class="action-buttons">


                        <a href="{{ route('stud_placements.show', $placement->assign_id) }}"
                            style="padding: 5px 10px; font-size: 14px; border-radius: 4px; background-color: #ffc107; color: white; text-decoration: none; margin-right: 5px;">
                            View</a>
                        @if (session('userType') === 'Proctor')

                        <a href="{{ route('stud_placements.edit', $placement->assign_id) }}"
                            style="padding: 5px 10px; font-size: 14px; border-radius: 4px; background-color: #ffc107; color: white; text-decoration: none; margin-right: 5px;">Edit</a>
                        @elseif (session('userType') === 'Admin' || session('userType') === 'Manager')
                        <form action="{{ route('stud_placements.destroy', $placement->assign_id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

@endsection