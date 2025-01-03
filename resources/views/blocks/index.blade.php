<!-- resources/views/blocks/index.blade.php -->
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
<h1>Blocks</h1>
@if ($userType=='Proctor')
<a href="{{ route('blocks.create') }}" class="btn btn-primary">Create New Block</a>
@endif
<table class="table mt-3">
    <thead>
        <tr>
            <th>Block ID</th>
            <th>Block Type</th>
            <th>Capacity</th>
            <th>Reserved For</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blocks as $block)
        <tr>
            <td>{{ $block->block_id}}</td>
            <td>{{ $block->block_type }}</td>
            <td>{{ $block->capacity }}</td>
            <td>{{ $block->reserved_for }}</td>
            <td>{{ $block->status }}</td>
            <td>
                <a href="{{ route('blocks.show', $block->block_id) }}" class="btn btn-info">View</a>
                @if (session($userType=='Manager'))
                <a href="{{ route('blocks.edit', $block->block_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('blocks.destroy', $block->block_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

<style>
/* blocks.css */

/* General styles for the form */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form group styling */
.form-group {
    margin-bottom: 20px;
}

/* Label styling */
label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #333;
}

/* Input and select styling */
input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

input:focus,
select:focus {
    border-color: #007bff;
    outline: none;
}

/* Button styling */
button[type="submit"] {
    display: inline-block;
    background-color: red;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: red;
}

/* Additional responsive styling */
@media (max-width: 768px) {
    form {
        padding: 15px;
    }

    button[type="submit"] {
        width: 100%;
    }
}
</style>