<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\OutwearController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class, 'index'])->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/outwear', [OutwearController::class, 'index'])->name('outwear');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::get('/login', [LoginController::class, 'index'])->name('login');


