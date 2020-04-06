@extends('layout.app')

@section('content')
    <div style="display: flex; justify-content: space-between">
        <div style="margin-right: 5px" class="card">
            <div class="card-header button-container">
                <h1>{{ $product->name }}</h1>
                <h3>{{ $status }}</h3>
            </div>
            <div class="card-body">
                <img class="item-image" src="{{ $product->image }}">
                <div>
                    {{ $product->ingredients }}
                </div>
                <div>
                    {{ $product->description }}
                </div>
                <hr>
                <div>
                    Đơn giá: {{ number_format($product->unit_price, 3) }}đ
                </div>
                <div>
                    {{ $product->producer }}
                </div>
                <div>
                    {{ $product->origin }}
                </div>
                <div>
                    Hạn sử dụng: {{ $product->expiration }}
                </div>
            </div>
            {{--Button--}}
            <div class="button-container">
                <a href="javascript:history.back()" class="btn btn-link">< Go back</a>
            </div>
        </div>

        <div style="height: 250px" class="card col-4">
            <span class="card-header heading">User Rating</span>
            <input id="input-{{ $product->id }}" type="text" name="input-1"
                   disabled
                   class="rating rating-loading card-body"
                   data-min="0"
                   data-max="5"
                   data-step="1" value="{{ $product->rating }}" data-size="xs">
        </div>
    </div>


    {{--    User rating--}}
    <hr style="border:3px solid #f1f1f1">

@endsection
