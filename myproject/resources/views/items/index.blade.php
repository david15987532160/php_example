@extends('layout.app')

@section('content')
    <h1>
        @if(empty($_GET['search_key']))
            {{ $products->total() }}
        @else
            {{ count($products) }}
        @endif
        Products
    </h1>
    <div class="bottom-header">
        <form
            action="/items"
            method="GET">
            <div class="input-group">
                <input
                    @if(!empty($_GET['search_key']))
                    value="{{ $_GET['search_key'] }}"
                    @endif
                    name="search_key"
                    class="form-control"
                    placeholder="Tìm kiếm trên Phanolink">
                <span>
                    <button class="btn btn-secondary" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>

    @if(count($products) > 0)
        @foreach($products as $product)
            <ul id="product-{{ $product->id }}" class="unordered-list">
                <li class="list-item">
                    <a
                        href="{{ route('items.show', $product->id) }}"
                    >
                        {{ $product->name }}
                    </a>
                    <input id="input-{{ $product->id }}" type="text" name="input-1"
                           disabled
                           class="rating rating-loading"
                           data-min="0"
                           data-max="5"
                           data-step="1" value="{{ $product->rating }}" data-size="xs">
                </li>
                <li class="list-item">
                    {{ $product->ingredients }}
                    <div class="tag">
                        @forelse($product->posts as $post)
                            <a
                                style="font-size: 14px"
                                class="btn btn-tag"
                                href="{{ route('posts.show', $post->id) }}"
                            >
                                {{--For rollback after delete post--}}
                                {{ session(['links' => request()->path()]) }}
                                <u>{{ $post->title }}</u>
                            </a>
                        @empty
                    </div>
                    <br>
                    <u>No related post for this product</u>
                    @endforelse
                </li>
            </ul>
        @endforeach
        @if(empty($_GET['search_key'])) {{ $products->links() }} @endif
    @else
        <p>No product found</p>
    @endif
@endsection
