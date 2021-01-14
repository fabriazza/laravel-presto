@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-5">
        <div class="row">
            <div class="col-12 my-4 text-center">
                <h1>Crea il tuo annuncio</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <form enctype="multipart/form-data" method="POST" action="{{ route('product.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titolo dell'annuncio</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descrizione dell'annuncio</label>
                        <textarea type="text" name="description" class="form-control" cols="30" rows="10"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label for="category">Categoria</label>
                        <select name="category_id" class="custom-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="price">Prezzo dell'annuncio</label>
                    <div class="input-group mb-3 w-50">
                        <input type="text" name="price" class="form-control">
                        <div class="input-group-append">
                          <span class="input-group-text">€</span>
                        </div>
                    </div>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- <div class="form-group">
                        <label for="img">Immagine del post</label>
                        <input type="file" name="img" class="form-control">
                    </div> --}}
                    <button type="submit" class="btn btn-primary mt-3">Crea</button>
                </form>
            </div>
        </div>
    </div>
@endsection
