@extends('layout.app')

@section('content')
    <h1>
        Welcome to Laravel
        @auth
            {{ auth()->user()->name }}
        @endauth
    </h1>
    <p>
        This is
        <a href="https://github.com/david15987532160/php_example/tree/master/myproject"
           style="color: #000eff">{{ strtoupper('myproject') }}
        </a> application
    </p>
@endsection
