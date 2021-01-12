@extends('layouts.app')

@section('content')
@if (session('accesso.negato'))
    <div class="alert alert-danger">
        Accesso negato, non sei un revisore
    </div>
@endif
<<<<<<< HEAD

<div class="container">
=======
<x-header/>
<div class="container py-5 my-5">
>>>>>>> 49db5471c933e51f7912eaa9f403f2cbe8b44b4d
    <div class="row justify-content-center align-items-center">
        @foreach ($products as $product)
        <div class="col-10 py-5 mt-5">
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
