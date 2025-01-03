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
<h1>Room Details</h1>


<div class="form-group">
    <label for="block">Room ID</label>
    <p>{{ $room->room_id }}</p>
</div>
<div class="form-group">
    <label for="block">Block</label>
    <p>{{ $room->block }}</p>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <p>{{ $room->status ?? 'N/A' }}</p>
</div>

<div class="form-group">
    <label for="capacity">Capacity</label>
    <p>{{ $room->capacity }}</p>
</div>

<a href="{{ route('rooms.index') }}" class="btn btn-secondary">Back</a>

<!-- Inline CSS -->
<style>
h1 {
    text-align: center;
    font-size: 32px;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-size: 16px;
    font-weight: bold;
    color: #555;
}

.form-group p {
    font-size: 16px;
    color: #333;
    margin-top: 5px;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
@endsection