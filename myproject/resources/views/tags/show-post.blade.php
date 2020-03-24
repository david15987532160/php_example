@extends('layout.app')

@section('content')
    @if(count($posts) > 0)
        <div class="card">
            <div class="card-header button-container">
                <h1>Posts by Tag</h1>
            </div>
            <div class="card-body">
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
            </div>
            <div class="button-container">
                <a href="javascript:history.back()" class="btn btn-link">< Go back</a>
            </div>
        </div>
    @endif
@endsection
