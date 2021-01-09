<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('categories')){
            $categories = Category::all();
            View::share(compact('categories'));
        }
        if(Schema::hasTable('products')){
            $products = Product::all();
            View::share(compact('products'));
        }
    }
}
