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
<h1 style="text-align: center; margin-bottom: 30px;">Rooms List</h1>

<a href="{{ route('rooms.create') }}" class="btn btn-primary"
    style="background-color: #007bff; padding: 10px 20px; border: none; border-radius: 5px; color: white; font-weight: bold; cursor: pointer;">Create
    New Room</a>

@if (session('success'))
<div class="alert alert-success mt-3"
    style="max-width: 600px; margin: 0 auto; padding: 10px; border-radius: 5px; background-color: #d4edda; color: #155724;">
    {{ session('success') }}
</div>
@endif

<table class="table mt-3" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f8f9fa;">Room
                ID</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f8f9fa;">Block
                ID</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f8f9fa;">
                Status</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f8f9fa;">
                Capacity</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f8f9fa;">
                Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rooms as $room)
        <tr>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $room->room_id }}</td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $room->block}}</td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $room->status ?? 'N/A' }}</td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $room->capacity }}</td>
            <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                <!-- View Button -->
                <a href="{{ route('rooms.show', $room->room_id) }}" class="btn btn-info btn-sm"
                    style="padding: 5px 10px; font-size: 14px; border-radius: 4px; background-color: #17a2b8; color: white; text-decoration: none; margin-right: 5px;">View</a>
                @if (session($userType=='Manager'))
                <!-- Edit Button -->
                <a href="{{ route('rooms.edit', $room->room_id) }}" class="btn btn-warning btn-sm"
                    style="padding: 5px 10px; font-size: 14px; border-radius: 4px; background-color: #ffc107; color: white; text-decoration: none; margin-right: 5px;">Edit</a>

                <!-- Delete Button -->
                <form action="{{ route('rooms.destroy', $room->room_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        style="padding: 5px 10px; font-size: 14px; border-radius: 4px; background-color: #dc3545; color: white; border: none;">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection