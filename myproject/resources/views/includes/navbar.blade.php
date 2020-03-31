<ul>
    <div class="container">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- Left Side Of Navbar -->
                <li><a href="/">Home</a></li>
                <li class="dropdown">
                    <a href="/posts" class="drop-btn">Posts</a>
                    <div class="dropdown-content">
                        @foreach(\App\Models\Category::all() as $category)
                            <a href="{{ $category->path() }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li><a href="/items">Products</a></li>
                <li><a href="/conversations">Conversations</a></li>
                <li><a href="/contact">Contact us</a></li>
                <li><a href="/about">About</a></li>
                <!-- Right Side Of Navbar -->
                <!-- Authentication Links -->
                @guest
                    <li style="float: right;" class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li style="float: right;" class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li style="float: right" class="dropdown">
                        <a class="drop-btn">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</ul>
