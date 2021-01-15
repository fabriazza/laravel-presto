@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-5">
        <div class="row">
            <div class="col-12 my-4 text-center">
                <h1>{{ __('ui.create')}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <h1>{{$uniqueSecret}}</h1>
                <form enctype="multipart/form-data" method="POST" action="{{ route('product.store') }}">
                    @csrf
                    <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                    <div class="form-group">
                        <label for="title">{{ __('ui.title')}}</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('ui.desc')}}</label>
                        <textarea type="text" name="description" class="form-control" cols="30" rows="10"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label for="category">{{ __('ui.category')}}</label>
                        <select name="category_id" class="custom-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="price">{{ __('ui.price')}}</label>
                    <div class="input-group mb-3 w-50">
                        <input type="text" name="price" class="form-control">
                        <div class="input-group-append">
                          <span class="input-group-text">€</span>
                        </div>
                    </div>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group row">
                        <label for="images" class="col-md-12 col-form-label">Immagini</label>
                        <div class="col-md-12">
                            <div class="dropzone" id="drophere"></div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">{{ __('ui.create')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
