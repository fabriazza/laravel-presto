@extends('layouts.app')

@section('content')
@if ($product)
<div class="container my-5">
    <h1 class="text-center mb-5">{{__('ui.check')}}</h1>
    <div class="row align-items-center">
        <div class="col-8">
            <div class="card border-custom shadow card-border border-0 mb-3">
                <div class="row no-gutters border-primary">
                    <div class="col-md-4">
                        <img src="https://picsum.photos/seed/picsum/200/200" class="card-img img-custom rounded-0 rounded-start" alt="...">
                    </div>
                    <div class="col-md-8 card-body bg-second border-card text-soft px-4 d-flex">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="card-title">{{ $product->title }}</h3>
                                <p class="card-text text-truncate">{{ $product->description }}</p>
                                <div class="row">
                                    <div class="col-12 py-4">
                                        <p class="card-text text-soft my-3"><i class="fas fa-tags text-accent"></i> {{ $product->category->name }} </p>
                                        <p class="card-text text-soft my-3"><i class="far fa-credit-card text-accent"></i> {{ $product->price }} €</p>
                                        <p class="card-text text-soft my-3"><span class="text-accent"> {{__('ui.created')}}: </span> {{ $product->user->name }} </p>
                                        <p class="card-text text-soft my-3"><span class="text-accent"> E-mail: </span>{{ $product->user->email }} </p>
                                        <p class="card-text text-soft my-3"><span class="text-accent"> {{__('ui.createdat')}}: </span>{{ $product->created_at->format('d/m/Y')}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('revisor.accept', $product->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-success my-4">{{__('ui.accept')}}</button>
                    </form>
                    <form method="post" action="{{route('revisor.reject', $product->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{__('ui.reject')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@else
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">{{__('ui.listempty')}}</h3>
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-5">{{__('ui.rejected')}}</h3>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('ui.title')}}</th>
                        <th scope="col">{{__('ui.des')}}</th>
                        <th scope="col">{{__('ui.created')}}</th>
                        <th scope="col">{{__('ui.undo')}}</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach ($scartati as $scartato)
                  <tr>
                    <th scope="row">{{$scartato->id}}</th>
                    <td>{{$scartato->title}}</td>
                    <td>{{$scartato->description}}</td>
                    <td>{{$scartato->user->name}}</td>
                    <td>
                        <form method="post" action="{{route('revisor.undo', $scartato->id )}}">
                            @csrf
                            <button type="submit" class="btn bg-accent text-soft">{{__('ui.undo')}}</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection