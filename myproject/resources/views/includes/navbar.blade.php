<ul>
    <div class="container">
        <li><a href="/">Home</a></li>
        <li class="dropdown">
            <a href="/posts" class="drop-btn">Posts</a>
            <div class="dropdown-content">
                @foreach(\App\Category::all() as $category)
                    <a href="/category/{{ $category->id }}/posts">{{ $category->name }}</a>
                @endforeach
            </div>
        </li>
        <li><a href="/items">Products</a></li>
        <li><a href="/services">Services</a></li>
        <li><a href="/about">About</a></li>
        <li style="float: right;"><a href="/login">Login</a></li>
    </div>
</ul>
