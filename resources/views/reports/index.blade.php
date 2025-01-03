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
<h1>Reports</h1>

<a href="{{ route('reports.create') }}" class="btn btn-primary">Create New Report</a>

@if (session('success'))
<div class="alert alert-success mt-3">
    {{ session('success') }}
</div>
@endif

<table class="table mt-3">
    <thead>
        <tr>
            <th>Report ID</th>

            @if ($userType === 'Proctor')
            <th>Proctor ID</th>
            @endif

            @if ($userType === 'Student')
            <th>Student ID</th>
            @endif

            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
        <tr>
            <td>{{ $report->report_id }}</td>

            @if ($userType === 'Proctor')
            <td>{{ $report->proctor_id }}</td>
            @endif

            @if ($userType === 'Student')
            <td>{{ $report->student_id }}</td>
            @endif

            <td>{{ $report->status }}</td>
            <td>{{ $report->date }}</td>
            <td>
                <a href="{{ route('reports.show', $report->report_id) }}" class="btn btn-info btn-sm">View</a>
                @if (session('userType') === 'Admin' || session('userType') === 'Manager')
                <a href="{{ route('reports.edit', $report->report_id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('reports.destroy', $report->report_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Inline CSS -->
<style>
h1 {
    text-align: center;
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-info,
.btn-warning,
.btn-danger {
    font-size: 14px;
    padding: 8px 15px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.btn-info {
    background-color: #17a2b8;
    color: white;
}

.btn-info:hover {
    background-color: #138496;
}

.btn-warning {
    background-color: #ffc107;
    color: black;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

th,
td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f4f4f4;
    font-weight: bold;
}

tr:hover {
    background-color: #f9f9f9;
}

.alert {
    margin-top: 20px;
    font-size: 16px;
}
</style>
@endsection