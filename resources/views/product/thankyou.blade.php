@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-5 mt-5">
        <div class="row pt-3">
            <div class="col-12 text-center py-4">
                <h1 class="text-success">{{ __('ui.congrats')}}, {{ $product->user->name }}</h1>
                <h3 class="text-second">{{ __('ui.congrats2')}}.</h3>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10">
               <x-card
               title="{{ $product->title }}"
               description="{{ $product->description }}"
               price="{{ $product->price }}"
               categoryname="{{ $product->category->name }}"
               user="{{ $product->user->name }}"
               createdat="{{ $product->created_at->format('d/m/y') }}"
               categoryid="{{ $product->category->id }}"
               productid="{{ $product->id }}"
               :images="$product->images"
               />
            </div>
        </div>
    </div>
@endsection
