@extends('layouts.appman')


@section('content')
@if (session('userType') === 'Manager')

<div style="text-align: center;">
    <h1>
        <i>Welcome to the Manager Page!</i>
    </h1>

    <!-- Adding the image -->
    <img src="{{ asset('images/manager.jpg') }}" alt="Students Image"
        style="max-width: 100%; height: auto; border-radius: 10px; margin-top: 20px;">
</div>
@else
<div class="container text-center">
    <h1>Access Denied</h1>
    <p>You do not have the required permissions to view this page.</p>
    <a href="{{ route('home') }}" class="btn btn-secondary">Return to Home</a>
</div>
@endif
@endsection