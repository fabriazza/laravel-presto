@extends('layouts.app')

@section('content')
@if (session('message'))
    <div class="container pt-5 mt-5">
        <div class="row justify-content-center pt-4">
            <div class="col-10 alert alert-success">
                {{ __('ui.deletemessage')}}
            </div>
        </div>
    </div>
@endif

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

@if ($product)
<div class="container py-5 mt-5">
    <div class="row justify-content-center pt-4">
        <h1 class="text-center mb-5 font-weight-bold">{{__('ui.check')}}</h1>
        <div class="col-10 pb-3">
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
    <div class="container">
        @foreach ($product->images as $image)
        <div class="row py-5 justify-content-center align-items-center">
            <div class="col-12 d-flex justify-content-center">
                <img src="{{ $image->getUrl(300, 150) }}" class="rounded shadow">
            </div>
            @if ($image->labels)
                <div class="container pt-4 pb-2">
                    <div class="row justify-content-center">
                        @foreach ($image->labels as $label)
                            <span class="badge rounded-pill bg-second text-white text-0-8 p-2 mx-1 my-1">{{ $label }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="wrapperProgress col-12">
                <div class="col-6 col-md-2 d-flex justify-content-center">
                    <div class="wrapper-circle-box">
                        <svg width="100" height="100">
                          <defs>
                            <linearGradient id="gradient" x1="80%" y1="100%" x2="10%" y2="0%">
                              <stop offset="0%" stop-color="#6AB547" />
                              <stop offset="100%" stop-color="#ED1C24" />
                            </linearGradient>
                          </defs>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="#d3d3d3" stroke-width="10"/>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="url(#gradient)" stroke-width="10" stroke-dasharray="{{2.51*($image->adult)}} 251" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <label class="circle-label-1">Adult</label>
                </div>
                <div class="col-6 col-md-2 d-flex justify-content-center">
                    <div class="wrapper-circle-box">
                        <svg width="100" height="100">
                          <defs>
                            <linearGradient id="gradient" x1="80%" y1="100%" x2="10%" y2="0%">
                              <stop offset="0%" stop-color="#6AB547" />
                              <stop offset="100%" stop-color="#ED1C24" />
                            </linearGradient>
                          </defs>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="#d3d3d3" stroke-width="10"/>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="url(#gradient)" stroke-width="10" stroke-dasharray="{{2.51*($image->medical)}} 251" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <label class="circle-label-2">Medical</label>
                </div>
                <div class="col-6 col-md-2 d-flex justify-content-center">
                    <div class="wrapper-circle-box">
                        <svg width="100" height="100">
                          <defs>
                            <linearGradient id="gradient" x1="80%" y1="100%" x2="10%" y2="0%">
                              <stop offset="0%" stop-color="#6AB547" />
                              <stop offset="100%" stop-color="#ED1C24" />
                            </linearGradient>
                          </defs>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="#d3d3d3" stroke-width="10"/>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="url(#gradient)" stroke-width="10" stroke-dasharray="{{2.51*($image->spoof)}} 251" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <label class="circle-label-3">Spoof</label>
                </div>
                <div class="col-6 col-md-2 d-flex justify-content-center">
                    <div class="wrapper-circle-box">
                        <svg width="100" height="100">
                          <defs>
                            <linearGradient id="gradient" x1="80%" y1="100%" x2="10%" y2="0%">
                              <stop offset="0%" stop-color="#6AB547" />
                              <stop offset="100%" stop-color="#ED1C24" />
                            </linearGradient>
                          </defs>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="#d3d3d3" stroke-width="10"/>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="url(#gradient)" stroke-width="10" stroke-dasharray="{{2.51*($image->violence)}} 251" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <label class="circle-label-4">Violence</label>
                </div>
                <div class="col-6 col-md-2 d-flex justify-content-center">
                    <div class="wrapper-circle-box">
                        <svg width="100" height="100">
                          <defs>
                            <linearGradient id="gradient" x1="80%" y1="100%" x2="10%" y2="0%">
                              <stop offset="0%" stop-color="#6AB547" />
                              <stop offset="100%" stop-color="#ED1C24" />
                            </linearGradient>
                          </defs>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="#d3d3d3" stroke-width="10"/>
                          <circle cx="50" cy="50" r="40" fill="none" stroke="url(#gradient)" stroke-width="10" stroke-dasharray="{{2.51*($image->racy)}} 251" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <label class="circle-label-5">Racy</label>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row py-5">
        <div class="col-12">
            <div class="row">
                <div class="col-12 d-flex justify-content-around">
                    <form method="post" action="{{route('revisor.reject', $product->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-danger px-5 py-3 font-weight-bold text-1">{{__('ui.reject')}}</button>
                    </form>
                    <form method="post" action="{{route('revisor.accept', $product->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-success px-5 py-3 font-weight-bold text-1">{{__('ui.accept')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container my-5 py-3">
    <div class="row pt-4">
        <div class="col-12">
            <h3 class="text-center">{{__('ui.listempty')}}</h3>
        </div>
    </div>
</div>
@endif

<div class="container py-5">
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
