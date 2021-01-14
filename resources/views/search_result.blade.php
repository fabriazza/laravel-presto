@extends('layouts.app')

@section('content')
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Ricerca:{{ $q }}</h1>
            
        </div>
    </div>
</div>

@if (count($products)!=0)
@foreach ($products as $product)
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card border-custom shadow card-border border-0 mb-3">
                <div class="row no-gutters border-primary">
                    <div class="col-md-4">
                        <img src="https://picsum.photos/seed/picsum/200/200" class="card-img img-custom rounded-0 rounded-start" alt="...">
                    </div>
                    <div class="col-md-8 card-body bg-second border-card text-soft px-4 d-flex">
                        <div class="row">
                            <div class="col-12 mx-0">
                                <h4 class="card-title">{{ $product->title }}</h4>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="row">
                                    <div class="col-12 col-md-6 py-4">
                                        <span class="text-accent"><i class="fas fa-tags"></i> </span><a href="{{route('category.index', $product->category->id)}}" class=" text-soft link-custom text-capitalize">{{ $product->category->name }}</a>
                                        <p class="card-text text-soft my-3"><i class="far fa-credit-card text-accent"></i> {{ $product->price }} €</p>
                                    </div>
                                    <div class="col-12 col-md-6 py-4">
                                            <small class="card-text"><i class="fas fa-user text-accent"></i> {{ $product->user->name }}</small>
                                            <small class="card-text ml-1"><i class="fas fa-clock text-accent"></i> {{ $product->created_at->format('d/m/Y')}}</small>
                                            <a href="{{route('product.show', $product->id)}}" class="btn bg-accent text-soft text-center mt-3">Mostra annuncio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Non ci sono annunci per la parola {{ $q }}</h3>
        </div>
    </div>
</div>
@endif
    
@endsection