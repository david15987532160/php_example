@extends('layout.app')

@section('content')
    <h1>{{ $title }}</h1>
    <h2>Email</h2>

    <form
        method="POST"
        action="/contact">
        @csrf

        <div class="form-group">
            <label for="email">
                Email Address
            </label>

            <input
                type="text"
                id="email"
                name="email"
                class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Email us</button>

    </form>
@endsection
