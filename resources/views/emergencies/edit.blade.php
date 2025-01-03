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
    <h1>Edit Emergency Record</h1>
    <form action="{{ route('emergencies.update', $emergency->emerg_id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="s_id">Student ID</label>
            <input type="text" name="s_id" id="s_id" class="form-control" value="{{ $emergency->s_id }}" required>
        </div>

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control"
                value="{{ $emergency->first_name }}">
        </div>

        <div class="form-group">
            <label for="second_name">Second Name</label>
            <input type="text" name="second_name" id="second_name" class="form-control"
                value="{{ $emergency->second_name }}">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $emergency->last_name }}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $emergency->address }}">
        </div>

        <div class="form-group">
            <label for="region">Region</label>
            <input type="text" name="region" id="region" class="form-control" value="{{ $emergency->region }}">
        </div>

        <div class="form-group">
            <label for="zone">Zone</label>
            <input type="text" name="zone" id="zone" class="form-control" value="{{ $emergency->zone }}">
        </div>

        <div class="form-group">
            <label for="woreda">Woreda</label>
            <input type="text" name="woreda" id="woreda" class="form-control" value="{{ $emergency->woreda }}">
        </div>

        <div class="form-group">
            <label for="kebele">Kebele</label>
            <input type="text" name="kebele" id="kebele" class="form-control" value="{{ $emergency->kebele }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $emergency->phone }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<!-- Inline CSS -->
<style>
.container {
    max-width: 800px;
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

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 5px;
}

.form-control:focus {
    border-color: #007bff;
    outline: none;
}

button.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button.btn-primary:hover {
    background-color: #0056b3;
}
</style>

@endsection