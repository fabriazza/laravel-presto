@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-5">
        <div class="row">
            <div class="col-12 text-center py-4">
                <h1 class="text-success">Complimenti, {{ $product->user->name }} annuncio inserito con successo!</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10">
                <div class="card mb-3"">
                    <div class="row no-gutters">
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ $product->title }}</h5>
                          <p class="card-text">{{ $product->description }}</p>
                          <p class="card-text"><small class="text-muted">{{ $product->category->name }}</small></p>
                          <p class="card-text"><small class="text-muted">{{ $product->price }}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
