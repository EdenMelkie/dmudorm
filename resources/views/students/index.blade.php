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

<!-- Show error message if any -->
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="container">
    <h1>Students List</h1>

    <!-- Search Form -->
    <form class="form-inline" action="{{ route('students.index') }}" method="GET">
        <input class="form-control mr-sm-2" type="search" name="id" placeholder="Search by ID"
            value="{{ request()->query('id') }}" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <!-- Add New Student Button -->
    @if($userType==='Admin')
    <a href="{{ route('students.create') }}" class="btn btn-primary mt-3">Add New Student</a>

    <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="excel_file">Upload Excel File</label>
            <input type="file" class="form-control" name="excel_file" required>
            @error('excel_file')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    @endif

    <!-- Students Table -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->first_name }} {{ $student->second_name }} {{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->department }}</td>
                <td>
                    <a style="background-color:green;" href="{{ route('students.show', $student->id) }}"
                        class="btn btn-warning">View</a>
                    @if (session('userType') === 'Admin' || session('userType') === 'Manager')
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;"
                        onsubmit="return confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('stud_placements.create', $student->student_id) }}" class="btn btn-warning btn-sm"
                        style="padding: 5px 10px; font-size: 14px; border-radius: 4px; background-color: #ffc107; color: white; text-decoration: none; margin-right: 5px;">Assign</a>
                    @endif
                    <script>
                    function confirmDelete() {
                        return confirm("Are you sure you want to delete this student?");
                    }
                    </script>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No students found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection