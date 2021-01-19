@extends('layouts.app')

@section('content')
@if ($product)
<div class="container my-5">
    <h1 class="text-center mb-5 font-weight-bold">{{__('ui.check')}}</h1>
    <div class="row justify-content-center">
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
           :images="$product->images"
           />
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12">
            <div class="row">
                <div class="col-12 d-flex justify-content-around">
                    <form method="post" action="{{route('revisor.reject', $product->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{__('ui.reject')}}</button>
                    </form>
                    <form method="post" action="{{route('revisor.accept', $product->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-success">{{__('ui.accept')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container my-5 py-5">
    <div class="row pt-4">
        <div class="col-12">
            <h3 class="text-center">{{__('ui.listempty')}}</h3>
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-5 font-weight-bold">{{__('ui.rejected')}}</h3>
        </div>
        <div class="col-12 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('ui.title')}}</th>
                        <th scope="col">{{__('ui.des')}}</th>
                        <th scope="col">{{__('ui.created')}}</th>
                        <th scope="col">{{__('ui.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scartati as $scartato)
                    <tr>
                        <th scope="row">{{$scartato->id}}</th>
                        <td>{{$scartato->title}}</td>
                        <td>{{substr($scartato->description, 0, 20) . " [...]"}}</td>
                        <td>{{$scartato->user->name}}</td>
                        <td class="d-flex justify-content-start align-items-center">
                            <form action="{{ route('revisor.delete', $scartato) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger font-weight-bold text-white mr-2">{{ __('ui.delete')}}</button>
                            </form>
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
