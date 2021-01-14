@extends('layouts.app')

@section('content')
    <div class="container my-4 py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center mb-5">Lavora Con Noi</h1>
                <form  method="POST" action="{{route('lavora.send')}}">
                    @csrf      
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome e Cognome</label>
                        <input type="name" class="form-control" name="name" id="exampleFormControlInput" placeholder="Nome e Cognome" value="{{old('name')}}>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Email</label>
                      <input type="email" class="form-control" name="mail" id="exampleFormControlInput1" placeholder="Email" value="{{old('mail')}}>  
                      @error('mail')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Breve descrizione del candidato</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="Inserisci la tua descrizione">{{old('message')}}</textarea>                       
                      @error('message')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn bg-accent text-soft mt-3">Candidati Ora</button>
                  </form>
            </div>
        </div>
    </div>
@endsection