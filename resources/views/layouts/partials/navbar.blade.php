<nav class="navbar navbar-expand-md navbar-dark bg-success shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ request()->is('/') ? 'navicon' : '' }}" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ request()->is('plant') ? 'navicon' : '' }}" href="/plantlist">Plant </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ request()->is('about') ? 'navicon' : '' }}" href="/about">About </a>
                    </li>

                    @if (Route::has('login'))
                        <li class="nav-item mx-2 pt-3 pt-md-0">
                            <a class="btn btn-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item">
                        <a class="nav-link active" href="#" role="button">
                            Hi, <span class="text-uppercase">{{ Auth::user()->name }}</span> |
                        </a>
                    </li>

                    <div class="">
                        {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a> --}}

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-light" type="submit">{{ __('Logout') }}</button>
                        </form>
                    </div>

                @endguest
            </ul>
        </div>
    </div>
</nav>
