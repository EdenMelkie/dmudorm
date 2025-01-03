@extends('layouts.appstd')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Emergency Form Data</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Second Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Region</th>
                    <th>Zone</th>
                    <th>Woreda</th>
                    <th>Kebele</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emergencyForms as $form)
                    <tr>
                        <td>{{ $form->id }}</td>
                        <td>{{ $form->first_name }}</td>
                        <td>{{ $form->second_name }}</td>
                        <td>{{ $form->last_name }}</td>
                        <td>{{ $form->address }}</td>
                        <td>{{ $form->email }}</td>
                        <td>{{ $form->region }}</td>
                        <td>{{ $form->zone }}</td>
                        <td>{{ $form->woreda }}</td>
                        <td>{{ $form->kebele }}</td>
                        <td>{{ $form->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
