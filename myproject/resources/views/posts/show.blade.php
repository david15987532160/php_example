@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header button-container">
            <h1>{{ $post->title }}</h1>
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'mb'])!!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('-', ['class' => 'btn btn-default']) }}
            {!!Form::close()!!}
        </div>

        <div class="card-body">
            {{ $post->body }}
            <hr>
            <div>Written on {{ $post->created_at }}</div>
            <div>Updated at {{ $post->updated_at }}</div>
        </div>

        <div class="button-container">
            <a href="javascript:history.back()" class="btn btn-link">< Go back</a>
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-link">Edit</a>
        </div>
    </div>
@endsection
