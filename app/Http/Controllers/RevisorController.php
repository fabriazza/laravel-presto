<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.revisor');
    }
    
    public function index()
    {
        $product=Product::where('is_accepted', null)->orderBy('created_at', 'desc')->first();
        $scartati=Product::where('is_accepted', false)->get();
        return view('revisor', compact('product', 'scartati'));
    }

    public function setAccepted($product_id, $value)
    {
        $product=Product::find($product_id);
        $product->is_accepted=$value;
        $product->save();
        return redirect(route('revisor'));
    }

    public function reject($product_id)
    {
        return $this->setAccepted($product_id, false);
    }

    public function accept($product_id)
    {
        return $this->setAccepted($product_id, true);
    }

    public function undo($product_id)
    {
        return $this->setAccepted($product_id, null);
    }
}