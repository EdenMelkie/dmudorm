@if (session(key: 'userType') === 'Student')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DMU DMS') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>


    <div id="app">
        @include('partials.headertitlestd')
        @include('partials.headerstd')
        <!-- @include('partials.navbar') -->
        <!-- Include the header partial -->

        <main class="py-4">

            @yield('content')


            <!-- Main content area that is specific to the page -->
        </main>
    </div>
</body>

</html>
@else
<div class="container text-center">
    <script>
    window.alert(
        ' <H1> Access Denied </H1> <p> You do not have the required permissions to view this page. (This is Students page). </p >'
    );
    </script>

    <a style="color: red; text-align:center; justify-content:center; background-color:azure; margin: 140px;"
        href="{{ route('login') }}" class="btn btn-secondary">Return to Login (Student) </a>
</div>
@endif