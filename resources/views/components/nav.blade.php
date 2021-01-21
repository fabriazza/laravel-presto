<nav class="navbar navbar-expand-md bg-accent shadow fixed-top">
    <div class="container">
        <a class="navbar-brand w-25 nav-link text-soft" href="{{ url('/') }}">
            <img class="prestonav" src="https://i.ibb.co/vqGRscR/Senza-titolo-1.png" alt="presto" border="0">
        </a>
        <button class="navbar-toggler text-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon p-1"><i class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="nav-link text-soft" href="{{route('product.index')}}"> {{ __('ui.product') }}</a>
                </li>
                <li class="nav-item dropdown d-flex align-items-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn text-soft" data-toggle="modal" data-target="#exampleModalCenter">
                        {{ __('ui.category') }}
                    </button>
                </li>
                <li>
                    <a class="nav-link text-soft" href="{{route('lavora')}}">{{__('ui.workwhitus')}}</a>
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
                    <a class="nav-link  text-soft" href="{{ route('register') }}">{{ __('ui.register') }}</a>
                </li>
                @endif
                <li class="nav-item ml-3">
                    <a class="btn btn-accent  text-soft" href="{{ route('product.create') }}"><i class="far fa-plus-square mr-1"></i> {{ __('ui.insert') }}</a>
                </li>
                @else
                @if (Auth::user()->is_revisor)
                    <li class="nav-item"><a class="nav-link" href="{{route('revisor')}}">Admin <span class="badge badge-pill badge-warning">{{\App\Models\Product::ToBeRevisionedCount()}}</span></a></li>
                @endif
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle  text-soft" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-main" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-accent" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('ui.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                    <li class="nav-item ml-3">
                        <a class="btn btn-accent" href="{{ route('product.create') }}"><i class="far fa-plus-square mr-1"></i> {{ __('ui.insert') }}</a>
                    </li>
                @endguest
                <li class="nav-item dropdown d-flex align-items-center ml-3">
                    <a class="nav-link dropdown-toggle  text-soft" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ __('ui.language') }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right flags-dropdown bg-main">
                        <x-flag
                            lang="{{'it'}}"
                            nation="{{'it'}}"
                        />
                        <x-flag
                            lang="{{'en'}}"
                            nation="{{'gb'}}"
                        />
                        <x-flag
                            lang="{{'es'}}"
                            nation="{{'es'}}"
                        />
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
