<!-- @extends('layouts.appadd') -->

@section('title', 'Registration Form')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="username">username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <!-- <div class="form-group">
                            <label for="userType">User Type</label>
                            <input type="text" class="form-control" id="userType" name="userType" required>
                        </div> -->

                        <div class="form-group">
                            <label for="userType">User Type</label>
                            <select class="form-control" id="userType" name="userType" required>
                                <option value="">Select User Type</option>
                                <option value="Admin">Admin</option>
                                <option value="Proctor">Proctor</option>
                                <option value="Manager">Manager</option>
                                <option value="Student">Student</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection