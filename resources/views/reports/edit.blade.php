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
<h1>Edit Report</h1>
<form action="{{ route('reports.update', $report->report_id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="proctor_id">Proctor ID</label>
        <input type="text" name="proctor_id" id="proctor_id" class="form-control" value="{{ $report->proctor_id }}"
            required>
    </div>

    <div class="form-group">
        <label for="student_id">Student ID</label>
        <input type="text" name="student_id" id="student_id" class="form-control" value="{{ $report->student_id }}"
            required>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" id="status" class="form-control" value="{{ $report->status }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Report</button>
</form>

<!-- Inline CSS -->
<style>
h1 {
    text-align: center;
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
    font-family: 'Arial', sans-serif;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
    display: block;
}

.form-control {
    width: 100%;
    padding: 10px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    background-color: #f9f9f9;
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
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

form {
    max-width: 500px;
    margin: 0 auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
}

.btn-primary:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
}
</style>
@endsection