@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-5">
        <div class="row justify-content-center pt-4">
            <div class="col-12 col-md-6">
                <h1 class="text-center mb-5">{{ __('ui.workwhitus')}}</h1>
                <form  method="POST" action="{{route('lavora.send')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ __('ui.ns')}}</label>
                        <input type="name" class="form-control" name="name" id="exampleFormControlInput" placeholder="{{ __('ui.ns')}}" value="{{old('name')}}">
                        @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="mail" placeholder="Email" value="{{old('mail')}}">
                      @error('mail')
                         <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">{{ __('ui.talkus')}}</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="{{ __('ui.talkus')}}">{{old('message')}}</textarea>
                      @error('message')
                         <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn bg-accent text-soft mt-3">{{ __('ui.sub')}}</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
