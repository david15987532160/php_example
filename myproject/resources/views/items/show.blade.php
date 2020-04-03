@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header button-container">
            <h1>{{ $item->name }}</h1>
            <h2>{{ $status }}</h2>
        </div>

        <div class="card-body">
            <img class="item-image" src="{{ $item->image }}">
            <div>
                {{ $item->ingredients }}
            </div>
            <div>
                {{ $item->description }}
            </div>
            <hr>
            <div>
                Đơn giá: {{ number_format($item->unit_price, 3) }}đ
            </div>
        </div>
    </div>
@endsection
