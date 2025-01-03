@extends('layouts.appadd')


@section('content')
<div style="text-align: center;">
    <h1>
        <i>Welcome to the Admin Page!</i>
    </h1>

    <!-- Adding the image -->
    <img src="{{ asset('images/admin.jpg') }}" alt="Students Image"
        style="max-width: 100%; height: auto; border-radius: 10px; margin-top: 20px;">
</div>
@endsection