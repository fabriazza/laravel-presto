@extends('layouts.app')

@section('content')
    <div class="container justify-content-center py-5 mt-5">
        <div class="row pt-2">
            <div class="col-12 my-4 text-center">
                <h1>{{ __('ui.create')}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <form enctype="multipart/form-data" method="POST" action="{{ route('product.update', $product) }}">
                    @csrf
                    <input type="hidden" name="uniqueSecret2" value="{{$uniqueSecret2}}">
                    <input type="hidden" name="productId" value="{{$product->id}}">
                    <div class="form-group">
                        <label for="title">{{ __('ui.title')}}</label>
                        <input type="text" name="title" class="form-control" value="{{$product->title}}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('ui.desc')}}</label>
                        <textarea type="text" name="description" class="form-control" cols="30" rows="10">{{$product->description}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6 p-0 pr-md-3 m-0">
                                <div class="form-group">
                                    <label for="category">{{ __('ui.category')}}</label>
                                    <select name="category_id" class="custom-select">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" 
                                            {{ $category->id == $product->category->id ? 'selected' : '' }}    
                                            >{{$category->name}}</option>
                                        @endforeach    
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 p-0 pl-md-3 m-0">
                                <label for="price">{{ __('ui.price')}}</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="price" class="form-control" value="{{$product->price}}">
                                    <div class="input-group-append">
                                      <span class="input-group-text">€</span>
                                    </div>
                                </div>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="images" class="col-md-12 col-form-label">{{ __('ui.images')}}</label>
                        <div class="col-md-12">
                            <div class="dropzone drag-area" id="edithere"> 
                                
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-accent mt-3">{{ __('ui.create')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
