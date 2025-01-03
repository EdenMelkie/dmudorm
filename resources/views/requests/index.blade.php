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
<h1>Requests List</h1>
@if ($userType==='Student'||$userType='Proctor'||$userType='Manager')
<a href="{{ route('requests.create') }}" class="btn btn-primary">Create New Request</a>
@endif
<table class="table mt-3">
    <thead>
        <tr>
            <th>Request ID</th>
            @php
            $user = session('username'); // Check session value
            @endphp
            <th>Student ID</th> <!-- Changed the column header -->
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
        <tr>
            <td>{{ $request->request_id }}

            </td>
            <td>{{ $request->student_id }}</td> <!-- Changed the data here -->
            <td>{{ $request->date }}</td>
            <td>{{ $request->status }}</td>
            <td>
                <!-- View Button -->
                <a href="{{ route('requests.show', $request->request_id) }}" class="btn btn-info btn-sm">View</a>
                @if ($userType==='Student')
                <a href="{{ route('requests.edit', $request->request_id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('requests.destroy', $request->request_id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form> @elseif($userType==='Proctor'||'Manager')
                <a href="{{ route('requests.approve', $request->request_id) }}" class="btn btn-success">Approve</a>

                @endif

                <!-- Update method -->

                <!-- Delete Button -->

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

.table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f8f9fa;
    color: #333;
    font-weight: bold;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-sm {
    padding: 5px 10px;
    font-size: 14px;
    border-radius: 4px;
}

.btn-info {
    background-color: #17a2b8;
    color: white;
    border: none;
}

.btn-info:hover {
    background-color: #138496;
}

.btn-warning {
    background-color: #ffc107;
    color: white;
    border: none;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}
</style>
@endsection