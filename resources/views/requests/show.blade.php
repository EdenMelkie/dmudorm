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
<h1>Request Details</h1>
<div class="card">
    <div class="card-header">
        Request ID: {{ $request->request_id }}
    </div>
    <div class="card-body">
        <p><strong>Student:</strong> {{ $request->student->first_name }} {{ $request->student->last_name }}</p>
        <p><strong>Date:</strong> {{ $request->date }}</p>
        <p><strong>Status:</strong> {{ $request->status }}</p>
        <p><strong>Comment:</strong> {{ $request->comment ?? 'No comment provided' }}</p>
        <p><strong>Purpose:</strong> {{ $request->purpose ?? 'No purpose provided' }}</p>
        <p><strong>Reason:</strong> {{ $request->reason ?? 'No reason provided' }}</p>

        <a href="{{ route('requests.index') }}" class="btn btn-secondary">Back to Requests</a>
    </div>
</div>

<!-- Inline CSS -->
<style>
h1 {
    text-align: center;
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

.card {
    margin: 0 auto;
    max-width: 600px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #007bff;
    color: white;
    font-size: 20px;
    padding: 15px;
    border-radius: 8px 8px 0 0;
}

.card-body {
    padding: 20px;
}

.card-body p {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 10px;
}

.card-body p strong {
    font-weight: bold;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
@endsection