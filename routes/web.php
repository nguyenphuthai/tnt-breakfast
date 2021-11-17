<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [\App\Http\Controllers\IndexController::class, "index"])->name("index");
Route::get('/about', function () {
    return view('about');
})->name("about");
Route::get("/menu", [\App\Http\Controllers\ProductController::class, "index"])->name("menu");
Route::get("/cart", [\App\Http\Controllers\CartController::class, "index"])->name("cart");
Route::get("/addCart/{id}", [\App\Http\Controllers\CartController::class, "pushToCart", "id"])->where(["id"])->name("addCart");
Route::get('/book', function () {
    return view('book');
})->name("book");
Route::get("/changeQuantity/{id}/q/{quantity}", [\App\Http\Controllers\CartController::class, "changeQuantity", "id", "quantity"])->where(["id", "quantity"])->name("changeQuantity");
Route::get("/destroyItem/{id}",[CartController::class,"destroyItem","id"])->where(["id"])->name("destroyItem");
