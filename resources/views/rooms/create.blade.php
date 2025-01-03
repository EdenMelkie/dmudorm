<!-- resources/views/rooms/create.blade.php -->

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
<h1 style="text-align: center; margin-bottom: 30px;">Create Room</h1>

<form method="POST" action="{{ route('rooms.store') }}"
    style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
    @csrf

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="block" style="font-weight: bold; margin-bottom: 5px;">Room ID</label>
        <input type="text" name="room_id" id="room_id" class="form-control"
            style="padding: 10px; border-radius: 5px; width: 100%;" required>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="block" style="font-weight: bold; margin-bottom: 5px;">Block</label>
        <input type="text" name="block" id="block" class="form-control"
            style="padding: 10px; border-radius: 5px; width: 100%;" required>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="status" style="font-weight: bold; margin-bottom: 5px;">Status</label>
        <select name="status" id="status" class="form-control" style="padding: 10px; border-radius: 5px; width: 100%;">
            <option value="">Select Status</option>
            <option value="Available">Available</option>
            <option value="Occupied">Occupied</option>
            <option value="Under Maintenance">Under Maintenance</option>
        </select>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label for="capacity" style="font-weight: bold; margin-bottom: 5px;">Capacity</label>
        <input type="number" name="capacity" id="capacity" class="form-control"
            style="padding: 10px; border-radius: 5px; width: 100%;" required>
    </div>

    <button type="submit" class="btn btn-primary"
        style="background-color: #007bff; padding: 10px 20px; border: none; border-radius: 5px; color: white; font-weight: bold; cursor: pointer;">Save
        Room</button>
    <a href="{{ route('rooms.index') }}" class="btn btn-secondary"
        style="background-color: #6c757d; padding: 10px 20px; border: none; border-radius: 5px; color: white; font-weight: bold; margin-left: 10px; cursor: pointer;">Cancel</a>
</form>
@endsection