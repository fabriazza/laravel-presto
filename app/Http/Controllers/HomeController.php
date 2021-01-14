<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Product::where('is_accepted', true)
        ->orderBy('created_at', 'desc')->take(5)->get();
        return view('home', compact('products'));
    }

    public function indexcategories($categoryid)
    {
        $category=Category::find($categoryid);
        $products=$category->products()->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);
        return view('product.indexcategories', compact('products'));
    }

    public function search(Request $request){
        $q=$request->input('q');
        $products=Product::search($q)->where('is_accepted',true)->get();


        return view('search_result',compact('q','products'));
    }

    public function locale($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
