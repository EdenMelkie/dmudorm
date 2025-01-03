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
    <h1>Emergency Records</h1>

    <!-- Updated Search Form -->
    <!-- <nav class="navbar navbar-light bg-light justify-content-center">
        <form class="form-inline d-flex w-25" method="GET" action="{{ route('emergencies.index') }}">
            <input class="form-control mr-2 w-75" name="search" type="search" placeholder="Search by ID"
                aria-label="Search" value="{{ request('search') }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </nav> -->
    @if ($userType=='Student')
    <a href="{{ route(name: 'emergencies.create') }}" class="btn btn-primary">Add New Record</a>
    @endif

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Student ID</th>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Last Name</th>
                <!-- <th>Address</th>
            <th>Region</th>
            <th>Zone</th>
            <th>Woreda</th>
            <th>Kebele</th> 
            <th>Phone</th>-->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($emergencies as $emergency)
            <tr>
                <!-- <td>{{ $emergency->emerg_id }}</td> -->
                <td>{{ $emergency->s_id }}</td>
                <td>{{ $emergency->first_name }}</td>
                <td>{{ $emergency->second_name }}</td>
                <td>{{ $emergency->last_name }}</td>
                <!-- <td>{{ $emergency->address }}</td>
                <td>{{ $emergency->region }}</td>
                <td>{{ $emergency->zone }}</td>
                <td>{{ $emergency->woreda }}</td>
                <td>{{ $emergency->kebele }}</td> 
                <td>{{ $emergency->phone }}</td>-->
                <td>
                    <a href="{{ route('emergencies.show', $emergency->emerg_id) }}" class="btn btn-view">View</a>
                    @if ($userType=='Student')
                    <a href="{{ route('emergencies.edit', $emergency->emerg_id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('emergencies.destroy', $emergency->emerg_id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="12">No records found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

<!-- Inline CSS Styles -->
<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
    font-size: 28px;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    font-size: 16px;
    padding: 8px 16px;
    text-align: center;
    border-radius: 4px;
    text-decoration: none;
    cursor: pointer;
    margin: 5px;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-view {
    background-color: #28a745;
    color: white;
}

.btn-view:hover {
    background-color: #218838;
}

.btn-edit {
    background-color: #ffc107;
    color: white;
}

.btn-edit:hover {
    background-color: #e0a800;
}

.btn-delete {
    background-color: #dc3545;
    color: white;
    border: none;
}

.btn-delete:hover {
    background-color: #c82333;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table th,
table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #f8f9fa;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.alert {
    margin-top: 20px;
    padding: 10px;
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
}
</style>

@endsection