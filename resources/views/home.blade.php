@extends('layouts.app')

@section('content')
@if (session('accesso.negato'))
    <div class="alert alert-danger">
        Accesso negato, non sei un revisore
    </div>
@endif

<div class="container">
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
        
            />
        </div>
        @endforeach
    </div>
</div>
@endsection
