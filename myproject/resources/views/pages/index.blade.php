@extends('layout.app')

@section('content')
    <h1>Welcome to Laravel {{ $name }}</h1>
    <p>This is <span style="color: #000eff">{{ strtoupper('myproject') }}</span> application</p>
@endsection
