<div class="card border-custom shadow card-border border-0 mb-1">
    <div class="row no-gutters border-primary">
        <div class="col-md-4">
            <div id="card{{ $productid }}" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($images as $image)
                        <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                            <img src="{{ $image->getUrl(300, 300) }}" class="card-img img-custom rounded-0 rounded-start">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#card{{ $productid }}" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#card{{ $productid }}" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-8 card-body bg-second border-card text-soft px-4 d-flex">
            <div class="row">
                <div class="col-12 mx-0">
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="card-text">{{ substr($description, 0, 190) . " [...]" }}</p>
                    <div class="row">
                        <div class="col-12 col-md-6 py-4">
                            <span class="text-accent"><i class="fas fa-tags"></i> </span><a href="{{route('category.index', $categoryid)}}" class=" text-soft link-custom text-capitalize">{{ $categoryname }}</a>
                            <p class="my-3"><i class="far fa-credit-card text-accent"></i><span class="card-text text-soft text-1-5 font-weight-bold"> {{ $price }} €</span></p>
                        </div>
                        <div class="col-12 col-md-6 py-4">
                            <small class="card-text"><i class="fas fa-user text-accent"></i> {{ $user }}</small>
                            <small class="card-text ml-1"><i class="fas fa-clock text-accent"></i> {{ $createdat}}</small>
                            <a href="{{route('product.show', $productid)}}" class="btn btn-accent secondary text-center mt-3">{{ __('ui.showproduct') }}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
