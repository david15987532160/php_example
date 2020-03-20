<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{'app.name', 'MY PROJECT'}}</title>
</head>

<body>
    @include('includes.navbar')
    <div class="container">
        @include('includes.messages')
        @yield('content')
    </div>
</body>
</html>
