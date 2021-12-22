<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            {{ config('app.name', 'Trip Review') }}
        </div>
        <div class="nav-items">
            @guest
                @if (Route::has('register'))
                    <div><a href="{{ route('register') }}" class="nav-login">Register</a></div>
                @endif
                @if (Route::has('login'))
                    <div><a href="{{ route('login') }}" class="nav-reg">Login</a></div>
                @endif
            @else
                <div class="name-tag">
                    <a id="navbarDropdown" class="nav-name" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div aria-labelledby="navbarDropdown">
                        <a class="nav-logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            @endguest

            <div class="line-vert"></div>
            @guest
            @else
            <div><a href="/dashboard" class="nav-item">DASHBOARD</a></div>
            @endguest
            <div><a href="/about" class="nav-item">ABOUT</a></div>
            <div><a href="/" class="nav-item">HOME</a></div>
        </div>
    </div>
</nav>
