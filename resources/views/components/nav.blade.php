<nav class="navbar navbar-expand-md bg-accent shadow-sm">
    <div class="container">
        <a class="navbar-brand nav-link text-soft" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown d-flex align-items-center">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle  text-soft" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Categorie
                    </a>

                    <div class="dropdown-menu dropdown-menu-category dropdown-menu-right dropdown-menu-right-category bg-main border-0" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <a class="dropdown-item text-accent" href="{{route('category.index', $category)}}">{{$category->name}}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto d-flex align-items-center  text-soft">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link  text-soft" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link  text-soft" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                        <li class="nav-item ml-3">
                            <a class="btn btn-accent  text-soft" href="{{ route('product.create') }}"><i class="far fa-plus-square mr-1"></i> Inserisci annuncio</a>
                        </li>
                @else
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle  text-soft" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-main" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-accent" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="btn btn-accent" href="{{ route('product.create') }}"><i class="far fa-plus-square mr-1"></i> Inserisci annuncio</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
