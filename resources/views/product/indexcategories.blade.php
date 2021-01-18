@extends('layouts.app')

@section('content')

<div class="container-fluid category-section py-5 mb-3">
    <div class="container">
        <div class="row justify-content-center align-items-center mt-5 position-relative">
            <div class="col-12 col-md-6 py-5">
                <h1 class="text-white font-weight-bold">{{ __('ui.welcomecategories') }} <span class="text-capitalize">{{ $products->first()->category->name }}</span></h1>
            </div>
            <div class="col-12 col-md-6 py-5 text-center">
                <img src="/img/presto_category.svg" alt="Presto" class="category-section-img">
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center align-items-center">
        @foreach ($products as $product)
        <div class="col-10">
           <x-card
           title="{{ $product->title }}"
           description="{{ $product->description }}"
           price="{{ $product->price }}"
           categoryname="{{ $product->category->name }}"
           user="{{ $product->user->name }}"
           createdat="{{ $product->created_at->format('d/m/y') }}"
           categoryid="{{ $product->category->id }}"
           productid="{{$product->id}}"
           :images="$product->images"
           />
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{$products->links()}}
    </div>
</div>
@endsection
