@extends('layout.app')

@section('content')
    <h1>
        Posts
        <a style="float: right;" href="./posts/create" class="btn btn-primary">Create post</a>
    </h1>
    @if(count($posts) > 0)
        @foreach($posts as $key => $post)
            <ul class="unordered-list">
                <li class="list-post">
                    <a href="/posts/{{ $post->id }}">
                        {{ ($posts->perPage() * $posts->currentPage()) - ($posts->perPage()) + ($key + 1) }})
                        {{ $post -> title }}
                    </a>
                    @if (count($tags) > 0)
                        <div class="tag">
                            @foreach($tags[$key] as $tag)
                                <a href="tag/{{ $tag->id }}/posts" class="btn btn-tag">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </li>

                <li class="list-post">
                    {{ $post -> body }}
                </li>

                <li class="list-post">
                    User: {{ ucfirst($post->users) }}
                </li>

                <li class="list-post">
                    Mail: {{ $post->mail }}
                </li>
                <li class="list-post">
                    Posted on: {{ $post->created_at }}
                </li>
            </ul>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No post found</p>
    @endif

@endsection
