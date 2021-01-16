@extends('layouts.app')

@section('content')
<div class="container my-5">
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
