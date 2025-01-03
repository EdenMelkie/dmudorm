<!-- resources/views/blocks/create.blade.php -->
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
<h1>Create New Block</h1>

<form action="{{ route('blocks.store') }}" method="POST">
    @csrf

    <div class="form-group" style="margin-bottom: 15px;">
        <label for="block_id" style="font-weight: bold;">Block ID</label>
        <input type="text" name="block_id" id="block_id" class="form-control" required
            style="width: 100%; padding: 8px; border-radius: 4px;">
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label for="block_type" style="font-weight: bold;">Block Type</label>
        <select name="block_type" id="block_type" class="form-control" required
            style="width: 100%; padding: 8px; border-radius: 4px;">
            <option value="">Select Block Type</option>
            <option value="academic">Mother Block</option>
            <option value="dormitory">Sister Block</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label for="capacity" style="font-weight: bold;">Capacity</label>
        <input type="number" name="capacity" id="capacity" class="form-control" required
            style="width: 100%; padding: 8px; border-radius: 4px;">
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label for="reserved_for" style="font-weight: bold;">Reserved For</label>
        <select name="reserved_for" id="reserved_for" class="form-control"
            style="width: 100%; padding: 8px; border-radius: 4px;">
            <option value="">Select Reserved For</option>
            <option value="students">Male</option>
            <option value="staff">Female</option>
            <option value="faculty">Other</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label for="status" style="font-weight: bold;">Status</label>
        <select name="status" id="status" class="form-control" required
            style="width: 100%; padding: 8px; border-radius: 4px;">
            <option value="">Select Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="under_maintenance">Under Maintenance</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <button type="submit" class="btn btn-primary"
        style="padding: 10px 20px; font-size: 16px; border-radius: 4px;">Create Block</button>
</form>
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
    background-color: #007bff;
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
    background-color: #0056b3;
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