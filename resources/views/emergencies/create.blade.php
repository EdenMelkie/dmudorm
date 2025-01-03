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
    <h1>Add Emergency Record</h1>
    <form action="{{ route('emergencies.store') }}" method="POST">
        @csrf
        @php
        $user = session('username')
        @endphp
        <div class="form-group">
            <label for="s_id">Student ID</label>
            <input type="text" name="s_id" id="s_id" class="form-control" value="{{$user}}">
        </div>

        <div class="form-group">
            <label for="first_name">Captive First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="second_name">Captive Second Name</label>
            <input type="text" name="second_name" id="second_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="last_name">Captive Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">Captive Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>

        <div class="form-group">
            <label for="region">Captive Region</label>
            <input type="text" name="region" id="region" class="form-control">
        </div>

        <div class="form-group">
            <label for="zone">Captive Zone</label>
            <input type="text" name="zone" id="zone" class="form-control">
        </div>

        <div class="form-group">
            <label for="woreda">Captive Woreda</label>
            <input type="text" name="woreda" id="woreda" class="form-control">
        </div>

        <div class="form-group">
            <label for="kebele">Captive Kebele</label>
            <input type="text" name="kebele" id="kebele" class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Captive Phone</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Inline CSS Styles -->
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
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    color: #333;
}

input.form-control {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

button.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button.btn-primary:hover {
    background-color: #0056b3;
}

@media (max-width: 768px) {
    .container {
        padding: 10px;
    }
}
</style>
@endsection