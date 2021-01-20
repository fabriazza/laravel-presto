<?php

namespace App\Http\Controllers;

use App\Mail\RevisorMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CandidatoRequest;

class MailController extends Controller
{
    public function lavora()
    {
        if(Auth::user()){
            return view('lavora');
        };
        return view('product.loginregister');
    }
    public function candidato(CandidatoRequest $request)
    {

        $name = $request->input('name');
        $mail = $request->input('mail');
        $message = $request->input('message');

        $bag=compact('name','mail','message');

        $email= new RevisorMail($bag);

        Mail::to('fab@fab.it')->send($email);

        return redirect(route('lavora.thankyou'));
    }
    public function thankyou()
    {
        return view('lavora.thankyou');
    }
}


