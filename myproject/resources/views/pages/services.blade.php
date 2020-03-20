@extends('layout.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($services) > 0)
        <ul>
            @foreach($services as $service)
                <li class="list-item">
                    <a href="https://phanolink.com/">{{ $service }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
