@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        @foreach ($products as $product)
        <div class="col-10">
            <div class="card mb-3"">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="https://picsum.photos/seed/picsum/200/200" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <span>Categoria: </span><a href="{{route('category.index', $product->category)}}">{{ $product->category->name }}</a>
                            <p class="card-text"><small class="text-muted">Prezzo: {{ $product->price }} €</small></p>
                            <p class="card-text"><small class="text-muted">Pubblicato da: {{ $product->user->name }}</small></p>
                            <p class="card-text"><small class="text-muted">Il: {{ $product->created_at->format('d/m/Y') }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            {{$products->links()}}
        </div>
    </div>
</div>
@endsection