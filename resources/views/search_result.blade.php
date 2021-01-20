@extends('layouts.app')

@section('content')
<div class="container mt-5 py-5">
    <div class="row pt-5">
        <div class="col-12">
            <h1 class="text-center">{{__('ui.se')}}: {{ $q }}</h1>

        </div>
    </div>
</div>
@if (count($products)!=0)
<div class="container py-5">
    <div class="row justify-content-center">
        @foreach ($products as $product)
            <div class="col-10 py-4">
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
</div>
@else
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">{{__('ui.wordnotfind')}} {{ $q }}</h3>
        </div>
    </div>
</div>
@endif
@endsection
