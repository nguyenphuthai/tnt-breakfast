<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
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

Route::get("/", [IndexController::class, "index"])->name("index");
Route::get('/about', function () {
    return view('about');
})->name("about");

Route::get("/menu", [ProductController::class, "index"])->name("menu");
Route::get("/cart", [CartController::class, "index"])->name("cart");

Route::get('/book', function () {
    return view('book');
})->name("book");

Route::get("/addCart/{id}", [CartController::class, "pushToCart", "id"])->where(["id"])->name("addCart");
Route::get("/changeQuantity/{id}/q/{quantity}", [CartController::class, "changeQuantity", "id", "quantity"])->where(["id","quantity"])->name("changeQuantity");
Route::get("/destroyItem/{id}",[CartController::class,"destroyItem","id"])->where(["id"])->name("destroyItem");
Route::post("/order",[CartController::class,"addOrder"])->name("orderBill");
