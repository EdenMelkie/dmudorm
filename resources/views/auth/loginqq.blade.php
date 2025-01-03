<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white p-8 shadow-md rounded-lg">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold">{{ __('Login') }}</h2>
                    </div>

                    <!-- Display errors -->
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 p-4 rounded-md text-red-700">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Display session errors -->
                    @if (session('error'))
                        <div class="mb-4 bg-red-100 p-4 rounded-md text-red-700">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Username -->
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700">{{ __('username') }}</label>
                            <input id="username" type="text" class="mt-2 p-3 w-full border rounded @error('username') border-red-500 @enderror" name="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('password') }}</label>
                            <input id="password" type="password" class="mt-2 p-3 w-full border rounded @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4 flex items-center">
                            <input id="remember" type="checkbox" class="form-checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 text-sm text-gray-600">{{ __('Remember Me') }}</label>
                        </div>

                        <!-- Submit -->
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 text-white p-3 w-full rounded-lg hover:bg-blue-600">{{ __('Login') }}</button>
                        </div>

                        <!-- Forgot Password -->
                        @if (Route::has('password.request'))
                            <div class="mt-4 text-center">
                                <a class="text-sm text-blue-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your password?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
