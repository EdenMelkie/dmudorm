@extends('layouts.appadd')

@section('content')
<h1 style="text-align: center;">Welcome to Managers Page!</h1>
<div class="container">
    <form action="{{ route('employees.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="employeeFile">Upload Employee File</label>
            <input type="file" name="employeeFile" class="form-control" id="employeeFile" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Upload</button>
    </form>
</div>
@endsection