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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about_us', [AboutController::class, 'index'])->name('about');


