@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $conversation->title }}</h1>
            <h3>Posted by {{ $conversation->user->name }}</h3>
        </div>

        <div class="card-body">
            {{ $conversation->body }}
            <div>Written on: {{ $conversation->created_at }}</div>
            <hr>
            @if(count($conversation->replies) > 0)
                @foreach($conversation->replies as $reply)
                    <div>
                        <b>{{ $reply->user->name }} said...</b>
                    </div>
                    <div>
                        {{ $reply->body }}
                    </div>
                    @if(count($conversation->replies) > 1)
                        <br>
                    @endif
                @endforeach
            @else
                No reply for this conversation
            @endif
        </div>

        <div class="button-container">
            <a href="javascript:history.back()" class="btn btn-link">< Go back</a>
        </div>
    </div>
@endsection
