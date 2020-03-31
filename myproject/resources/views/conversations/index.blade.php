@extends('layout.app')

@section('content')
    <h1>Conversations</h1>

    @if(count($conversations) > 0)
        @foreach($conversations as $conversation)
            <ul class="unordered-list">
                <li class="list-post">
                    <a href="{{ route('conversations.show', $conversation->id) }}">
                        {{ ($conversation->id) }})
                        {{ $conversation->title }}
                    </a>
                </li>
            </ul>
        @endforeach
    @else
        No conversation found
    @endif
@endsection
