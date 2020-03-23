@extends('layout.app')

@section('content')
    <h1>
        Posts
        <a style="float: right;" href="./posts/create" class="btn btn-primary">Create post</a>
    </h1>
    @if(count($posts) > 0)
        @foreach($posts as $key => $post)
            <ul class="unordered-list">
                <li class="list-item">
                    <a href="/posts/{{ $post->id }}">{{ ($key + 1) }}) {{ $post -> title }}</a>
                </li>

                <li class="list-item">
                    {{ $post -> body }}
                </li>

                <li class="list-item">
                    User: {{ ucfirst($post -> users) }}
                </li>

                <li class="list-item">
                    Mail: {{ $post -> mail }}
                </li>
                <li class="list-item">
                    Posted on: {{ $post->created_at }}
                </li>
            </ul>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No post found</p>
    @endif

@endsection
