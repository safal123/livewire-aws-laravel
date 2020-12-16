<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 8</title>
    <link rel="stylesheet" href="./css/app.css">
    @livewireStyles
</head>
<body>

    {{-- navbar starts --}}
    @include('layouts.navbar')
    {{-- navbar ends --}}

    <div class="">
        @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
        @endif
        @yield('content')
    </div>
    @livewireScripts
</body>
</html>
