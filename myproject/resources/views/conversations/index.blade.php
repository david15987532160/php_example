@extends('layout.app')

@section('content')
    <h1>Conversations</h1>

    @if(count($conversations) > 0)
        @foreach($conversations as $key => $conversation)
            <ul class="unordered-list">
                <li class="list-post">
                    <a href="{{ route('conversations.show', $conversation->id) }}">
                        {{ ($key + 1) }})
                        {{ $conversation->title }}
                    </a>
                </li>
                <li class="list-post">
                    Posted by: {{ $conversation->user->name }}
                </li>
                <li class="list-post">
                    Role(s):
                    <div class="tag">
                        @foreach($conversation->user->roles as $role)
                            <a class="btn btn-tag">
                                {{ $role->name }}
                            </a>
                        @endforeach
                    </div>
                </li>
            </ul>
        @endforeach
    @else
        No conversation found
    @endif
@endsection
