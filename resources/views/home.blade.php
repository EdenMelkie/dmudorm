@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('/') }}</div>

                <h1>This is our Home Page.</h1>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged out! if you wanna to login click Login button above') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
