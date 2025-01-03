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
<style>
/* Custom styles for the form */
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #4CAF50;
}

.form-group label {
    font-weight: bold;
    margin-bottom: 8px;
    color: #333;
}

.form-group input {
    border-radius: 4px;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    width: 100%;
}

.form-group input:focus {
    border-color: #4CAF50;
    outline: none;
}

button.btn {
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
}

button.btn-primary {
    background-color: #4CAF50;
    border: none;
    color: white;
}

button.btn-secondary {
    background-color: #f44336;
    border: none;
    color: white;
}

a.btn {
    text-decoration: none;
    margin-top: 20px;
}

/* Responsive adjustments */
@media (max-width: 600px) {
    .form-group input {
        font-size: 16px;
        padding: 12px;
    }

    button.btn {
        font-size: 14px;
        padding: 8px 16px;
    }
}
</style>

<h1>Edit Proctor Placement</h1>

<form method="POST" action="{{ route('proctor_placements.update', $proctorPlacement) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="emp_id">Employee ID</label>
        <input type="text" name="emp_id" id="emp_id" class="form-control"
            value="{{ old('emp_id', $proctorPlacement->emp_id) }}" required>
    </div>

    <div class="form-group">
        <label for="year">Year</label>
        <input type="number" name="year" id="year" class="form-control"
            value="{{ old('year', $proctorPlacement->year) }}">
    </div>

    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control"
            value="{{ old('date', $proctorPlacement->date) }}">
    </div>

    <div class="form-group">
        <label for="attribute1">Attribute 1</label>
        <input type="text" name="attribute1" id="attribute1" class="form-control"
            value="{{ old('attribute1', $proctorPlacement->attribute1) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('proctor_placements.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection