@extends('layout.app')

@section('content')
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <ul class="unordered-list">
                <li class="list-post">
                    <a href="/posts/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </li>

                <li class="list-post">
                    {{ $post->body }}
                </li>

                <li class="list-post">
                    <span>{{ $post->users }}</span> {{ $post->created_at }}
                </li>
            </ul>
        @endforeach
    @endif
@endsection
