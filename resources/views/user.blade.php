@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row pt-5 mt-5 align-items-center">
        <div class="col-12 col-md-6 d-flex  justify-content-center">
            <img src="{{Storage::url(Auth::user()->img)}}" class="w-50 img-fluid img-admin rounded-circle" alt="">
        </div>
        <div class="col-12 col-md-6">
            <h3>{{Auth::user()->name}}</h3>
            <i class="fas fa-at text-accent"></i><a class="text-decoration-none text-second" href="mailto"> {{Auth::user()->email}}</a>
            <p class="pt-3"><i class="fas fa-phone text-accent"></i> {{Auth::user()->tel}}</p>
            <p><i class="fas fa-box-open text-accent"></i> {{count(Auth::user()->products)}}</p>
        </div>
    </div>
</div>

<div class="container py-5 mt-4">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-5 font-weight-bold">{{__('ui.userannouncements')}}</h3>
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
                    @foreach (Auth::user()->products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->title}}</td>
                        <td>{{substr($product->description, 0, 20) . " [...]"}}</td>
                        <td>{{$product->user->name}}</td>
                        <td class="d-flex justify-content-start align-items-center">
                            <a href="{{route('product.edit', $product )}}" class="btn bg-accent text-soft mr-2">Modifica</a>
                            <form action="{{ route('revisor.delete', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger font-weight-bold text-white">{{ __('ui.delete')}}</button>
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
