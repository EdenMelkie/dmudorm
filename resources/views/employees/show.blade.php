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
    <h1 style="font-size: 2rem; margin-bottom: 20px; text-align: center;">Employee Details</h1>
    <div
        style="max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <p><strong>Emp ID:</strong> {{ $employee->emp_id }}</p>
        <p><strong>Status:</strong> {{ $employee->status ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $employee->email }}</p>
        <p><strong>First Name:</strong> {{ $employee->first_name ?? 'N/A' }}</p>
        <p><strong>Second Name:</strong> {{ $employee->second_name ?? 'N/A' }}</p>
        <p><strong>Last Name:</strong> {{ $employee->last_name ?? 'N/A' }}</p>
        <p><strong>Gender:</strong> {{ $employee->gender ?? 'N/A' }}</p>
        <p><strong>Entry Year:</strong> {{ $employee->entry_year ?? 'N/A' }}</p>
        <!-- <p><strong>Entry Year:</strong> {{ $employee->password ?? 'N/A' }}</p> -->
        <p><strong>Address:</strong> {{ $employee->address ?? 'N/A' }}</p>
        <a href="{{ route('employees.edit', $employee->emp_id) }}"
            style="display: block; text-align: center; padding: 10px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;">
            Edit Employee
        </a>
    </div>
</div>
@endsection