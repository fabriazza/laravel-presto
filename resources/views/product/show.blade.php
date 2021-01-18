@extends('layouts.app')

@section('content')
<div class="container my-5 mt-5">
    <div class="row pt-5">
      <div class="col-md-6 d-flex justify-content-center flex-column pt-5">
          <div class="col-12 mb-2">
            <div class="slider-for">
                @foreach ($product->images as $image)
                    <div>
                        <img src="{{ Storage::url($image->file) }}" class="img-fluid rounded">
                    </div>
                @endforeach
            </div>
          </div>
          <div class="col-12">
            <div class="slider-nav">
                @foreach ($product->images as $image)
                    <div class="mr-2">
                        <img src="{{ Storage::url($image->file) }}" class="img-fluid rounded">
                    </div>
                @endforeach
            </div>
          </div>
      </div>
      <div class="col-md-6 pt-5">
        <h3 class="text-2 text-accent">{{ $product->title }}</h3>
        <i class="far fa-credit-card text-accent mr-1"></i><span class="font-weight-bold text-1-5">{{$product->price}}€</span>
        <p><i class="fas fa-tags text-accent my-2"></i><a href="{{route('category.index', $product->category->id)}}" class=" text-second text-decoration-none text-capitalize"> {{ $product->category->name }}</a></p>
      </div>
    </div>
      <div class="col-12 my-5 p-3 border-top border-second">
        <div class="row">
          <div class="col-6">
            <h5>{{ __('ui.des')}}</h5>
            <p>{{ $product->description }}</p>
          </div>
          <div class="col-6">
            <h5>{{ __('ui.seller')}}</h5>
            <ul class="list-unstyled">
                <li><i class="fas fa-user text-accent my-2"></i> {{$product->user->name}}</li>
                <li><i class="fas fa-envelope-open-text text-accent my-2"></i><a href="mailto:{{$product->user->email}}" class="text-second text-decoration-none"> {{$product->user->email}}</a></li>
                <li><i class="fas fa-clock text-accent my-2"></i> {{$product->created_at->format('d/m/Y')}}</li>
            </ul>
          </div>
        </div>
      </div>
  </div>
@endsection
