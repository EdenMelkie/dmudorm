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
<h1>Absence Report Details</h1>

<table class="table">
    <tr>
        <th>Report ID</th>
        <td>{{ $report->report_id }}</td>
    </tr>
    <th>Proctor ID</th>
    @if ($userType === 'Proctor')
    <td>{{ $report->proctor_id }}</td>
    @endif
    <th>Student ID</th>
    @if ($userType === 'Student')
    <td>{{ $report->student_id }}</td>
    @endif
    <tr>
        <th>Status</th>
        <td>{{ $report->status }}</td>
    </tr>
    <tr>
        <th>Comment</th>
        <td>{{ $report->comment }}</td>
    </tr>
    <tr>
        <th>Date</th>
        <td>{{ \Carbon\Carbon::parse($report->date)->format('d/m/y H:i') }}</td>
    </tr>

</table>

<a href="{{ route('reports.index') }}" class="btn btn-secondary">Back to Reports</a>

<style>
h1 {
    text-align: center;
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
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

td {
    background-color: #fff;
}

tr:hover {
    background-color: #f9f9f9;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
@endsection