@extends('layout.app')

@section('content')
    <h1>Products</h1>
    <div class="bottom-header">
        <form action="/items" method="GET">
            <div class="input-group">
                <input value="" name="key_search" class="form-control"
                       placeholder="Tìm kiếm trên Canolink">

                <span>
                    <button class="btn btn-secondary" type="submit" value="">Search</button>
                </span>
            </div>
        </form>
    </div>

    @if(count($products) > 0)
        @foreach($products as $product)
            <ul class="unordered-list">
                <li class="list-item">
                    <a>{{ $product->name }}</a>
                </li>
            </ul>
        @endforeach
    @else
        <p>No product found</p>
    @endif
@endsection
