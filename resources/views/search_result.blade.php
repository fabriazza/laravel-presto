@extends('layouts.app')

@section('content')

<h1>Ricerca:{{ $q }}</h1>

@foreach ($products as $product)
    <p>{{ $product->title }}</p>
@endforeach
    
@endsection