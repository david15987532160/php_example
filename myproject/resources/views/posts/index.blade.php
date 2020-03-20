@extends('layout.app')

@section('content')
    <h1>
        Posts
        <a style="float: right;" href="./posts/create" class="btn btn-primary">Create post</a>
    </h1>
    @if(count($posts) > 0)
        @foreach($posts as $key => $val)
            <ul class="unordered-list">
                <li class="list-item">
                    {{ ($key + 1) }}) {{ $val -> title }}
                </li>

                <li class="list-item">
                    {{ $val -> body }}
                </li>

                <li class="list-item">
                    User: {{ ucfirst($val -> users) }}
                </li>

                <li class="list-item">
                    Mail: {{ $val -> mail }}
                </li>
            </ul>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>No post found</p>
    @endif

@endsection
