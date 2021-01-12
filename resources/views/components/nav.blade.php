<nav class="navbar navbar-expand-md bg-accent shadow-sm">
    <div class="container">
        <a class="navbar-brand w-50 nav-link text-soft" href="{{ url('/') }}">
            <img id="prestonav" src="https://i.ibb.co/dQCxfWy/presto.png" alt="presto" border="0">
        </a>
        <button class="navbar-toggler text-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon p-1"><i class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
              
            </ul>
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto d-flex align-items-center  text-soft">
                <li class="nav-item dropdown d-flex align-items-center">
                
                    <!-- Button trigger modal -->
                    <button type="button" class="btn text-soft" data-toggle="modal" data-target="#exampleModalCenter">
                        Categorie
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-accent text-center">
                            <div class="modal-header bg-main">
                            <h5 class="modal-title text-white" id="exampleModalLongTitle">Scegli una categoria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body shadow-lg">
                                @foreach ($categories as $category)
                                    <a class="dropdown-item text-accent bg-main text-capitalize" href="{{route('category.index', $category)}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                            <div class="modal-footer bg-main">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                            </div>
                        </div>
                        </div>
                    </div>
                        {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle text-soft" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Categorie
                        </a>
                        <div class="dropdown-menu dropdown-menu-category dropdown-menu-right dropdown-menu-right-category bg-main border-0" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <a class="dropdown-item text-accent" href="{{route('category.index', $category)}}">{{$category->name}}</a>
                            @endforeach
                        </div> --}}
                    </li>
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
                @if (Auth::user()->is_revisor)
                    <li class="nav-item"><a class="nav-link" href="{{route('revisor')}}">Admin <span class="badge badge-pill badge-warning">{{\App\Models\Product::ToBeRevisionedCount()}}</span></a></li>
                @endif
<<<<<<< HEAD
                <li class="nav-item dropdown d-flex align-items-center">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle  text-soft" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right bg-main" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-accent" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
=======
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle  text-soft" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-main" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-accent" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
>>>>>>> 49db5471c933e51f7912eaa9f403f2cbe8b44b4d
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
