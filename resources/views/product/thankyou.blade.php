@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-5">
        <div class="row">
            <div class="col-12 text-center py-4">
                <h1 class="text-success">{{ __('ui.congrats')}}, {{ $product->user->name }} {{ __('ui.congrats2')}}</h1>
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
               productid="{{$product->id}}"
               images="{{$product->images->pluck('file')}}"
               />
            </div>
        </div>
    </div>
@endsection
