<section class="container-fluid title-section">
    <div class="container">
        <div class="row justify-content-center align-items-center pb-5 position-relative">
            <div class="col-12 col-md-6 py-5">
                <h1 class="text-white font-weight-bold">Presto</h1>
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda velit accusamus ducimus tempore nihil perferendis explicabo consequuntur iusto reiciendis libero nulla, earum totam veniam animi dolorum corrupti nesciunt illo omnis!</p>
            </div>
            <div class="col-12 col-md-6 py-5 text-center">
                <img src="/img/presto_illustrazione.svg" alt="Presto" class="title-section-img">
            </div>
            <div class="row justify-content-center align-items-center py-5 search-block shadow-lg d-none d-md-block">
                <div class="col-12 col-9">
                    <div class="input-group search-block-inner">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorie</button>
                            <div class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <a class="dropdown-item text-accent" href="{{route('category.index', $category)}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Cosa vuoi cercare?" aria-label="Cosa vuoi cercare?" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-accent1" type="button" id="button-addon2"><i class="fas fa-search"></i> Cerca</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>