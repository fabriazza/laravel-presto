@extends('layouts.app')

@section('content')
<x-header/>

<div class="container py-5 my-5">
    <div class="row justify-content-center align-items-center mt-5">
        @if (session('accesso.negato'))
            <div class="alert alert-danger">
                {{ __('ui.denied')}}
            </div>
        @endif

        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="text-2 text-second">{{__('ui.lastannouncements')}}</h3>
                </div>
            </div>
        </div>

        @foreach ($products as $product)
        <div class="col-10 py-4">
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
        @endforeach
    </div>
</div>

<!-- NUMERI + RECENSIONI -->
<section id="numeri" class="container-fluid py-5">
    <div class="p-5">
      <h2 class="text-center mb-5 text-white">{{ __('ui.ournumbers')}}</h2>
      <div class="row d-flex justify-content-center">

        <div class="col-md-6 col-lg-3 mb-4 text-center">
          <h4 class="h1 font-weight-normal mb-3">
            <i class="fas fa-box-open text-accent"></i>
            <span class="d-inline-block text-white count-up" data-from="0" data-to="100" data-time="2000">{{ count($products) }}</span>
          </h4>
          <p class="font-weight-normal  text-white"> {{ __('ui.announcements')}}</p>
        </div>

        <div class="col-md-6 col-lg-3 mb-4 text-center">
          <h4 class="h1 font-weight-normal mb-3">
            <i class="fas fa-users text-accent"></i>
            <span class="d-inline-block text-white count1" data-from="0" data-to="250" data-time="2000">{{ count($users) }}</span>
          </h4>
          <p class="font-weight-normal text-white"> {{ __('ui.users')}}</p>
        </div>

        <div class="col-md-6 col-lg-3 mb-4 text-center">
          <h4 class="h1 font-weight-normal mb-3">
            <i class="fas fa-handshake text-accent"></i>
            <span class="d-inline-block text-white count2" data-from="0" data-to="330" data-time="2000">23750</span>
          </h4>
          <p class="font-weight-normal text-white"> {{ __('ui.transactions')}}</p>
        </div>

        <div class="col-md-6 col-lg-3 mb-4 text-center">
          <h4 class="h1 font-weight-normal mb-3">
            <i class="fas fa-hand-holding-usd text-accent"></i>
            <span class="d-inline-block text-white count3" data-from="0" data-to="430" data-time="2000">€ 1.3Ml</span>
          </h4>
          <p class="font-weight-normal text-white"> {{ __('ui.sells')}}</p>
        </div>
      </div>
    </div>
</section>

<!-- NEWSLETTER -->
<section id="newsletter" class="container py-5">
    <div class="row align-items-center justify-content-center">
      <div class="col-12 text-center">
        <h2 class="pt-4 text-accent">{{ __('ui.newsletter')}}</h2>
      </div>
      <div class="col-12 col-md-8 mt-2">
        <form>
          <div class="form-group">
            <label for="inputEmail">{{ __('ui.emailaddress')}}</label>
            <div class="input-group mb-1">
              <input type="text" class="form-control py-4" placeholder="Inserisci la tua email..." aria-label="Inserisci la tua email..." aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-accent" type="submit" id="button-addon2">{{ __('ui.signin')}}</button>
              </div>
            </div>
            <small id="emailHelp" class="form-text text-muted">{{ __('ui.privacy')}}</small>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="privacyCheckbox">
            <label class="form-check-label" for="privacyCheckbox">{{ __('ui.conditions')}}<a href="#" class="text-accent">Privacy policy</a></label>
          </div>
        </form>
      </div>
    </div>
</section>
@endsection
