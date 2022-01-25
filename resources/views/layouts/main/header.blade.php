@if (Route::has('login'))
    <header class="bg-purple">
        <nav class="navbar navbar-expand-lg navbar-dark bg-purple container">
            <a class="navbar-brand font-weight-bold" href="{{ route('home') }}">{{ env('APP_NAME', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-uppercase" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ isActive('home') }}">
                        <a class="nav-link" href="{{ route('home') }}">
                            {{ __('app.home') }}
                        </a>
                    </li>
                    <li class="nav-item {{ isActive('project') }}">
                        <a class="nav-link" href="{{ route('project') }}">
                            {{ __('app.projects') }}
                        </a>
                    </li>
                    @if ($menu->count())
                        <li class="nav-item dropdown {{ isActive('blog') }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('app.blog') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($menu as $item)
                                    <a class="dropdown-item" href="{{ route('blog.categories', $item->slug) }}">
                                        {{ $item->name }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                    <li class="nav-item {{ isActive('contact') }}">
                        <a class="nav-link" href="{{ route('contact') }}">
                            {{ __('app.contact') }}
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('images/avatar.jpeg') }}" alt="" class="rounded-circle" width="30">
                            @auth
                                <span class="ml-3">{{ Auth::user()->first_name }}</span>
                            @else
                                <span class="ml-3">{{ __('app.my_account') }}</span>
                            @endauth
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @auth
                                @if (Auth::user()->type === \App\Model\User::Admin)
                                    <a class="dropdown-item" href="{!! route('dashboard') !!}">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('auth.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                                @if (Route::has('register'))
                                    <a class="dropdown-item"
                                       href="{{ route('register') }}">{{ __('auth.register') }}</a>
                                @endif
                            @endauth
                        </div>

                    </li>

                </ul>
            </div>
        </nav>
    </header>
@endif
