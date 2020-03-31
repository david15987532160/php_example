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
                    <header style="display: flex; justify-content: space-between;">
                        <div>
                            <b>{{ $reply->user->name }} said...</b>
                        </div>
                        @if($reply->isBest())
                            <span style="color: #1e7e34">Best reply!!!</span>
                        @endif
                    </header>

                    {{ $reply->body }}

                    @if(!($loop->last))<br>@endif

                    @can('update', $conversation)
                        <form
                            action="/best-replies/{{ $reply->id }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-link"
                            >Best Reply?
                            </button>
                        </form>
                    @endcan

                    @if(!($loop->last))<br>@endif
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
