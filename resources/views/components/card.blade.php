<div class="card mb-3"">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="https://picsum.photos/seed/picsum/200/200" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $title }}</h5>
                <p class="card-text">{{ $description }}</p>
                <span>Categoria: </span><a href="{{route('category.index', $categoryid)}}">{{ $categoryname }}</a>
                <p class="card-text"><small class="text-muted">Prezzo: {{ $price }} €</small></p>
                <p class="card-text"><small class="text-muted">Pubblicato da: {{ $user }}</small></p>
                <p class="card-text"><small class="text-muted">Il: {{ $createdat}}</small></p>
            </div>
        </div>
    </div>
</div>