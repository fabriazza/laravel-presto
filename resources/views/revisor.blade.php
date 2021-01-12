@extends('layouts.app')

@section('content')
@if ($product)
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card border-custom shadow card-border border-0 mb-3">
                <div class="row no-gutters border-primary">
                    <div class="col-md-4">
                        <img src="https://picsum.photos/seed/picsum/200/200" class="card-img img-custom rounded-0 rounded-start" alt="...">
                    </div>
                    <div class="col-md-8 card-body bg-second border-card text-soft px-4 d-flex">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="card-title">{{ $product->title }}</h3>
                                <p class="card-text text-truncate">{{ $product->description }}</p>
                                <div class="row">
                                    <div class="col-12 py-4">
                                        <p class="card-text text-soft my-3"><i class="fas fa-tags text-accent"></i> {{ $product->category->name }} </p>
                                        <p class="card-text text-soft my-3"><i class="far fa-credit-card text-accent"></i> {{ $product->price }} €</p>
                                        <p class="card-text text-soft my-3"><span class="text-accent"> Creato da: </span> {{ $product->user->name }} </p>
                                        <p class="card-text text-soft my-3"><span class="text-accent"> E-mail: </span>{{ $product->user->email }} </p>
                                        <p class="card-text text-soft my-3"><span class="text-accent"> Creato il: </span>{{ $product->created_at->format('d/m/Y')}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('revisor.reject', $product->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Rifiuta</button>
                    </form>
                    <form method="post" action="{{route('revisor.accept', $product->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-success">Accetta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@else
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Non hai annunci da revisionare</h3>
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4>Prodotti scartati</h4>
        </div>
        <div class="col-12">
            @foreach ($scartati as $scartato)
                <h5>{{$scartato->title}}</h5>
                <form method="post" action="{{route('revisor.undo', $scartato->id )}}">
                    @csrf
                    <button type="submit" class="btn btn-success">Ripristina</button>
                </form>
            @endforeach
        </div>
    </div>
</div>
@endsection