@extends('layout.app')

@section('content')
    @auth
        <h1>Create Post</h1>

        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body text', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('tags', 'Tags') }}
            {{ Form::select('tags[]', $tags, '', ['class' => 'form-control', 'multiple']) }}
        </div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
    @else
        {{ session(['redirect_url' => 'posts/create']) }}
        <a href="/login">You are not log in! Log in now?</a>
    @endauth
@endsection
