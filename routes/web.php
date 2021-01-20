<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RevisorController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/thankyou/{product}', [ProductController::class, 'thankyou'])->name('product.thankyou');

Route::get('/product/{categoryid}/index', [HomeController::class, 'indexcategories'])->name('category.index');

Route::get('/revisor', [RevisorController::class , 'index'])->name('revisor');

Route::post('/revisor/product/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');

Route::post('/revisor/product/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');

Route::post('/revisor/product/{id}/undo', [RevisorController::class, 'undo'])->name('revisor.undo');

Route::delete('/revisor/product/{product}/delete', [ProductController::class, 'destroy'])->name('revisor.delete');

Route::get('/lavoraConNoi', [MailController::class, 'lavora'])->name('lavora');

Route::post('/lavora/send',[MailController::class, 'candidato'])->name('lavora.send');

Route::post('/product/images/upload',[ProductController::class, 'uploadImage'])->name('products.images.upload');

Route::delete('/product/images/remove',[ProductController::class, 'removeImage'])->name('products.images.remove');

Route::get('/product/images',[ProductController::class, 'getImages'])->name('products.images');

Route::get('/thankyou', [MailController::class, 'thankyou'])->name('lavora.thankyou');

Route::get('/product/show/{productid}',[ProductController::class, 'show'])->name('product.show');

Route::get('/search',[HomeController::class, 'search'])->name('search');

Route::post('/locale/{locale}', [HomeController::class, 'locale'])->name('locale');

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');