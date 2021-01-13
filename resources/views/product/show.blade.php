@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row shadow">
      <div class="col-md-6">
        {{-- carosello --}}
        {{-- <div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
          <ol class="carousel-indicators">
            @foreach ($post->images as $image)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index -1}}" class="{{$loop->first ? 'active' : ''}} icona"></li>
            @endforeach
          </ol>
          <div class="carousel-inner">
            @foreach ($post->images as $image)      
            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
              <img class="d-block mx-auto img-fluid" src="{{Storage::url($image->url)}}">
            </div>
            @endforeach
            
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev" aria-hidden="true"><i class="fas fa-chevron-left icona"></i></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next" aria-hidden="true"><i class="fas fa-chevron-right icona"></i></span>
            <span class="sr-only">Next</span>
          </a>
        </div> --}}
      </div>
      <div class="col-md-6">
        <h3 class="my-3">{{ $product->title }}</h3>
        <p class="font-weight-bold"><i class="far fa-credit-card text-accent mr-1"></i>{{$product->price}}€</p>
        <p><i class="fas fa-tags text-accent fa-lg my-2"></i><a href="{{route('category.index', $product->category->id)}}" class=" text-second text-decoration-none text-capitalize">{{ $product->category->name }}</a></p>
        {{-- @foreach ($post->tags as $tag)
        <a href="#" class="badge badge-secondary font-weight-light">{{ $tag->name }}</a>
        @endforeach --}}
        
      </div>
    </div>
      <div class="col-12 my-5 p-3 border-top border-dark">
        <div class="row">
          <div class="col-6">
            <h5>DESCRIZIONE</h5>
            <p>{{ $product->description }}</p>
          </div>
          <div class="col-6">
            <h5>DETTAGLI VENDITORE</h5>
            <ul class="list-unstyled">
                <li><i class="fas fa-user text-accent fa-lg my-2"></i> {{$product->user->name}}</li>
                <li><i class="fas fa-envelope-open-text text-accent fa-lg my-2"></i><a href="mailto:{{$product->user->email}}" class="text-second text-decoration-none"> {{$product->user->email}}</a></li>
                <li><i class="fas fa-clock text-accent fa-lg my-2"></i> {{$product->created_at->format('d/m/Y')}}</li>
            </ul>
          </div>
        </div>
      </div>
      {{-- <div class="col-12">
        <h3 class="my-4">Related Whiskey</h3>
      </div> --}}
      {{-- @foreach ($relatedPost as $post)
      <div class="col-12 col-md-3 my-3">
        <div data-aos="zoom-in" class="card bg-transparent border-0 mx-2">
          <img src="{{Storage::url($post->images()->first()->url)}}" class="card-img-top img-fluid img-cardSize" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text text-truncate">{{$post->body}}</p>
            <p class="font-weight-bold"><i class="far fa-credit-card mr-1"></i>{{$post->price}}€</p>
            <small class="d-block"> <strong>Category:</strong>{{ $post->category->name }}</small>
            @foreach ($post->tags as $tag)
            <a href="#" class="badge badge-secondary font-weight-light">{{ $tag->name }}</a>
            @endforeach
            <hr>
            <a href="{{route('post.show',$post)}}" class="btn button-edit">Go somewhere</a>
          </div>
        </div>
      </div>
      @endforeach --}}
      
    
  </div>
@endsection