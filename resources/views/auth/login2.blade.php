<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
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

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Username -->
                        <div class="mb-4">
                            <label for="UserName"
                                class="block text-sm font-medium text-gray-700">{{ __('UserName') }}</label>
                            <input id="UserName" type="text"
                                class="mt-2 p-3 w-full border rounded @error('UserName') border-red-500 @enderror"
                                name="UserName" value="{{ old('UserName') }}" required autofocus>
                            @error('UserName')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password"
                                class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="mt-2 p-3 w-full border rounded @error('password') border-red-500 @enderror"
                                name="password" required autocomplete="current-password">
                            @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4 flex items-center">
                            <input id="remember" type="checkbox" class="form-checkbox" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 text-sm text-gray-600">{{ __('Remember Me') }}</label>
                        </div>

                        <!-- Submit -->
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 text-white p-3 w-full rounded-lg hover:bg-blue-600">{{ __('Login') }}</button>
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