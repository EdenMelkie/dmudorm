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
<h1 style="text-align: center; color: #333;">Block Details</h1>

<div class="card" style="border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); margin-top: 20px;">
    <div class="card-header" style="background-color: #f8f9fa; font-size: 18px; font-weight: bold; text-align: center;">
        Block ID: {{ $block->id }}
    </div>
    <div class="card-body" style="padding: 20px;">
        <p><strong>Block ID:</strong> {{ $block->block_id }}</p>
        <p><strong>Block Type:</strong> {{ $block->block_type }}</p>
        <p><strong>Capacity:</strong> {{ $block->capacity }}</p>
        <p><strong>Reserved For:</strong> {{ ucfirst($block->reserved_for) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($block->status) }}</p>

        <!-- Add more details as needed -->
    </div>
    <div class="card-footer" style="text-align: center; padding: 10px; background-color: #f8f9fa;">
        <!-- Edit Button -->
        <a href="{{ route('blocks.edit', ['block' => $block->block_id]) }}" class="btn btn-warning btn-sm"
            style="padding: 5px 10px; font-size: 14px; border-radius: 4px; background-color: #ffc107; color: white; text-decoration: none; margin-right: 5px;">Edit</a>
        <a href="{{ route('blocks.index') }}" class="btn btn-secondary"
            style="padding: 5px 10px; font-size: 14px; border-radius: 4px; background-color: #6c757d; color: white; text-decoration: none;">Back
            to List</a>
    </div>
</div>
@endsection

<style>
/* blocks.css */

/* General styles for the form */
/* General Styles */
body {
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

/* Form Container */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form Group */
.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

/* Input and Select Styles */
input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s ease;
}

input:focus,
select:focus {
    border-color: #007bff;
    outline: none;
}

/* Button Styles */
button[type="submit"],
a.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 4px;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease;
    cursor: pointer;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

a.btn-warning {
    background-color: #ffc107;
    color: #fff;
}

a.btn-warning:hover {
    background-color: #e0a800;
}

a.btn-secondary {
    background-color: #6c757d;
    color: #fff;
}

a.btn-secondary:hover {
    background-color: #5a6268;
}

/* Card Styles */
.card {
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    background-color: #ffffff;
    overflow: hidden;
}

.card-header {
    padding: 15px;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    background-color: #f8f9fa;
}

.card-body {
    padding: 20px;
}

.card-footer {
    padding: 10px;
    text-align: center;
    background-color: #f8f9fa;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    form {
        padding: 15px;
    }

    button[type="submit"],
    a.btn {
        width: 100%;
    }
}
</style>