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
    <h1>Emergency Record Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Student ID: {{ $emergency->s_id }}</h5>
            <p><strong>First Name:</strong> {{ $emergency->first_name }}</p>
            <p><strong>Second Name:</strong> {{ $emergency->second_name }}</p>
            <p><strong>Last Name:</strong> {{ $emergency->last_name }}</p>
            <p><strong>Address:</strong> {{ $emergency->address }}</p>
            <p><strong>Region:</strong> {{ $emergency->region }}</p>
            <p><strong>Zone:</strong> {{ $emergency->zone }}</p>
            <p><strong>Woreda:</strong> {{ $emergency->woreda }}</p>
            <p><strong>Kebele:</strong> {{ $emergency->kebele }}</p>
            <p><strong>Phone:</strong> {{ $emergency->phone }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('emergencies.edit', $emergency->emerg_id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('emergencies.destroy', $emergency->emerg_id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
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

.card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 20px;
}

.card-footer {
    padding: 15px;
    background-color: #f1f1f1;
    text-align: right;
    border-top: 1px solid #ddd;
}

.card-footer .btn {
    margin-left: 10px;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
    color: white;
    padding: 8px 16px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
    color: white;
    padding: 8px 16px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-danger:hover {
    background-color: #c82333;
}

.card-title {
    font-size: 22px;
    font-weight: bold;
    color: #333;
}

.card-body p {
    font-size: 16px;
    line-height: 1.6;
}
</style>

@endsection