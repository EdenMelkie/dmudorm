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
<h1>Proctor Placements</h1>
@if ($userType=='Manager')
<a href="{{ route('proctor_placements.create') }}" class="btn btn-primary">Create New</a>

@endif

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <!-- <th>ID</th> -->
            <th>Employee ID</th>
            <th>Year</th>
            <th>Date</th>
            <th>Attribute1</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proctorPlacements as $placement)
        <tr>
            <!-- <td>{{ $placement->assign_id }}</td> -->
            <td>{{ $placement->emp_id }}</td>
            <td>{{ $placement->year }}</td>
            <td>{{ $placement->date }}</td>
            <td>{{ $placement->attribute1 }}</td>
            <td>
                <!-- View Button -->
                <a href="{{ route('proctor_placements.show', $placement->assign_id) }}"
                    style="display: inline-block; background-color: #6c63ff; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; font-size: 16px; transition: background-color 0.3s ease; cursor: pointer; margin-right: 10px;">
                    View
                </a>
                @if (session('userType') === 'Admin' || session('userType') === 'Manager')

                <!-- Edit Button -->
                <a href="{{ route('proctor_placements.edit', $placement) }}"
                    style="display: inline-block; background-color: #ffa500; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; font-size: 16px; transition: background-color 0.3s ease; cursor: pointer; margin-right: 10px;">
                    Edit
                </a>

                <!-- Delete Button -->
                <form action="{{ route('proctor_placements.destroy', $placement) }}" method="POST"
                    style="display:inline;" onsubmit=" return confirmDelete();">

                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        style="background-color: #e74c3c; color: white; padding: 12px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease;">
                        Delete
                    </button>

                </form>
                @endif
                <script style="color:red;">
                function confirmDelete() {
                    return confirm("Are you sure you want to delete this student?");
                }
                </script>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>
@endsection