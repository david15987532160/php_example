@extends('layout.app')

@section('content')
    @if(count($tags) > 0)
        @foreach($tags as $tag)
            <div>
                <p>
                    Tag: {{ $tag->name }}
                </p>

                <p>
                    Created at: {{ $tag->created_at }}
                </p>
            </div>
        @endforeach
    @endif
@endsection
