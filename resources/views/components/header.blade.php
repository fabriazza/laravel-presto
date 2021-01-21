<section class="container-fluid title-section">
    <div class="container">
        <div class="row justify-content-center align-items-center pb-5 position-relative">
            <div class="col-12 col-md-6 py-5">
                <h1 class="text-white font-weight-bold">{{ __('ui.welcome') }}</h1>
                <p class="text-white">{{ __('ui.footerdesc') }}</p>
            </div>
            <div class="col-12 col-md-6 py-5 text-center">
                <img src="/img/presto_illustrazione.svg" alt="Presto" class="title-section-img">
            </div>
            <div class="row justify-content-center align-items-center py-5 search-block shadow-lg d-none d-md-block">
                <div class="col-12 col-9">
                    <div class="input-group search-block-inner">
                        <div class="input-group-prepend">
                            {{-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('ui.category') }}</button>
                            <div class="dropdown-menu">
                                @foreach ($categories as $category)
                                <a class="dropdown-item text-accent" href="{{route('category.index', $category)}}">{{$category->name}}</a>
                                @endforeach
                            </div> --}}
                            <form action="{{ route('search') }}" method="get">
                                @csrf
                            </div>
                                <input type="text" name="q" class="form-control" placeholder="{{ __('ui.searchplaceholder') }}" aria-label="{{ __('ui.wus') }}" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-accent1" type="submit" id="button-addon2"><i class="fas fa-search"></i> {{ __('ui.search') }}</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
