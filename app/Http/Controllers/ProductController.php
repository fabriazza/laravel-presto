<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */




     public function create(Request $request)
    {
        if(!Auth::check()){
            return view('product.loginregister');
        }
        else {
            $categories = Category::all();
            $uniqueSecret = $request->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));
            return view('product.create', compact('categories', 'uniqueSecret'));
        }

    }

    public function uploadImage(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage($fileName, 120, 120));

        session()->push("images.{$uniqueSecret}", $fileName);
        return response()->json(
            [
                'id' => $fileName
            ]
        );
    }
    public function removeImage(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::id(),

        ]);

        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images,$removedImages);
        foreach ($images as $image) {
            $i = new ProductImage();
            $fileName = basename($image);
            $newFileName = "public/products/{$product->id}/{$fileName}";
            Storage::move($image,$newFileName);

            dispatch(new ResizeImage($newFileName, 300, 150));
            dispatch(new ResizeImage($newFileName, 300, 300));

            $i->file = $newFileName;
            $i->product_id = $product->id;
            $i->save();

            dispatch(new GoogleVisionSafeSearchImage($i->id));
            dispatch(new GoogleVisionLabelImage($i->id));
        }
        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        return redirect(route('product.thankyou', compact('product')));
    }

    public function getImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images,$removedImages);

        $data = [];

        foreach ($images as $image){
            $data[] = [
                'id' => $image,
                'src' => ProductImage::getUrlByFilePath($image, 120, 120)
            ];
        }
        return response()->json($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($productid)
    {
          $product=Product::find($productid);
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $images = ($product->images);
        foreach($images as $image){
            $image->delete();
        }

        File::deleteDirectory(storage_path("/app/public/products/{$product->id}"));
        $product->delete();

        return redirect()->back()->with('message', "OK");
    }

    public function thankyou(Product $product)
    {
        return view('product.thankyou', compact('product'));
    }
}
