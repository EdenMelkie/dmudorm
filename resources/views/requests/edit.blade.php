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
<h1>Edit Request</h1>
<form action="{{ route('requests.update', $request->request_id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- <div class="form-group">
        <label for="student_id">Student</label>
        <select name="student_id" id="student_id" class="form-control" required>
            @foreach ($students as $student)
            <option value="{{ $student->id }}" {{ $student->id == $request->student_id ? 'selected' : '' }}>
                {{ $student->first_name }} {{ $student->last_name }}
            </option>
            @endforeach
        </select>
    </div> -->
    <div class="form-group">
        <label for="student_id">Student</label>
        <input type="student_id" name="student_id" id="student_id" class="form-control"
            value="{{ $request->student_id }}" required readonly>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ $request->date }}" required readonly>
    </div>
    @if ($userType==='Student')
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" disabled>
            <option value="Pending" {{ $request->status == 'Pending' ? 'selected' : '' }}>Pending</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" class="form-control">{{ $request->comment }}</textarea>
    </div>
    <div class="form-group">
        <label for="purpose">Purpose</label>
        <input type="text" name="purpose" id="purpose" class="form-control" value="{{ $request->purpose }}">
    </div>
    <div class="form-group">
        <label for="reason">Reason</label>
        <textarea name="reason" id="reason" class="form-control">{{ $request->reason }}</textarea>
    </div>
    @elseif($userType==='Proctor'||'Manager')
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="Completed" {{ $request->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Update Request</button>
</form>

<!-- Inline CSS -->
<style>
h1 {
    text-align: center;
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.form-control {
    width: 100%;
    padding: 8px 12px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
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
}

.btn-primary:hover {
    background-color: #0056b3;
}

form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
@endsection