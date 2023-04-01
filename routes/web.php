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
use App\Http\Controllers\Frontend\LoginFrontController;
use App\Http\Controllers\Frontend\ForgotPasswordController;




//admin
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AddItemController;
use App\Http\Controllers\Admin\GenerateBillController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AddCategoryController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\OrderHistoryController;
use App\Http\Controllers\Admin\OrderViewController;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class, 'index'])->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/outwear', [OutwearController::class, 'index'])->name('outwear');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::get('/login', [LoginFrontController::class, 'index'])->name('login');
Route::get('/forgot', [ForgotPasswordController::class, 'index'])->name('forgot');




Route::prefix('admin')->group(function () {
	
	/*------------ Login  ------------*/
	Route::get('/', [LoginController::class, 'showLoginForm'])->name('admin.login');
	Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
	
	/*------------ Forgot password  ------------*/
	Route::get('/forgot', [LoginController::class, 'showForgotForm'])->name('admin.forgot');	
    Route::post('/forgot', [LoginController::class, 'forgot'])->name('admin.forgot.submit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
	
	/*------------ Admin Dashboard ------------*/
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
	
	/*------------ Customer Create ------------*/
	Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');
	Route::get('/customers_data', [CustomerController::class, 'customersdata'])->name('admin.customersdata');
	Route::get('/add_customer', [CustomerController::class, 'addCustomer'])->name('admin.add_customer');
	Route::post('/save_customer', [CustomerController::class, 'saveCustomer'])->name('admin.save_customer');	
	Route::get('/edit_customer/{id}', [CustomerController::class, 'editCustomer'])->name('admin.edit_customer');	
	Route::post('/update_customer', [CustomerController::class, 'updateCustomer'])->name('admin.update_customer');	
	Route::get('/delete_customer/{id}', [CustomerController::class, 'deleteCustomer'])->name('admin.delete_customer');	
	Route::get('/view_customer/{id}', [CustomerController::class, 'viewCustomer'])->name('admin.view_customer');	
	
	/*------------ Customer Items ------------*/
	Route::get('/items', [ItemsController::class, 'index'])->name('admin.items');
	Route::get('/add-item', [AddItemController::class, 'index'])->name('admin.add_item');
	
	/*------------ Cetegory ------------*/
	Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
	Route::get('/add-category', [AddCategoryController::class, 'index'])->name('admin.add_category');
	
	
    /*------------ Generate Bill ------------*/
    Route::get('/generate-bill', [GenerateBillController::class, 'index'])->name('admin.Generate_bill');
	
	/*------------ Payment ------------*/
    Route::get('/payment', [PaymentController::class, 'index'])->name('admin.payment');
	
	/*------------ Order History ------------*/
    Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('admin.order_history');
	Route::get('/order-history/1', [OrderViewController::class, 'index'])->name('admin.order_view');
	
	/*---sate---*/	
	Route::get('/states/{id}', [CustomerController::class, 'getState'])->name('admin.states');
	
});


