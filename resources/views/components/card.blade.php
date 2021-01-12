<div class="card border-custom shadow card-border border-0 mb-3">
    <div class="row no-gutters border-primary">
        <div class="col-md-4">
            <img src="https://picsum.photos/seed/picsum/200/200" class="card-img img-custom rounded-0 rounded-start" alt="...">
        </div>
        <div class="col-md-8 card-body bg-second border-card text-soft px-4 d-flex">
            <div class="row">
                <div class="col-9 mx-0">
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="card-text">{{ $description }}</p>
                    <div class="row">
                        <div class="col-12 col-md-6 py-4">
                            <span class="text-accent"><i class="fas fa-tags"></i> </span><a href="{{route('category.index', $categoryid)}}" class=" text-soft link-custom text-capitalize">{{ $categoryname }}</a>
                            <p class="card-text text-soft my-3"><i class="far fa-credit-card text-accent"></i> {{ $price }} €</p>
                        </div>
                    
                  
                        <div class="col-12 col-md-6 py-4">
                                <small class="card-text"><i class="fas fa-user text-accent"></i> {{ $user }}</small>
                                <small class="card-text ml-1"><i class="fas fa-clock text-accent"></i> {{ $createdat}}</small>
                                <a href="" class="btn bg-accent text-soft text-center mt-3">Mostra annuncio</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>