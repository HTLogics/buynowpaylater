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
	Route::get('/search_customer', [CustomerController::class, 'searchCustomer'])->name('admin.search_customer');
	
	/*------------ Customer Items ------------*/
	Route::get('/items', [ItemsController::class, 'index'])->name('admin.items');
	Route::get('/items_data', [ItemsController::class, 'itemsData'])->name('admin.items_data');
	Route::get('/add-item', [ItemsController::class, 'addItem'])->name('admin.add_item');
	Route::post('/save_item', [ItemsController::class, 'saveItem'])->name('admin.save_item');	
	Route::get('/edit_item/{id}', [ItemsController::class, 'editItem'])->name('admin.edit_item');
	Route::post('/update_item', [ItemsController::class, 'updateItem'])->name('admin.update_item');
	Route::post('/delete_file', [ItemsController::class, 'deleteFile'])->name('admin.deletefile');
	Route::get('/delete_item/{id}', [ItemsController::class, 'deleteItem'])->name('admin.delete_item');
	Route::get('/search_product', [ItemsController::class, 'searchItem'])->name('admin.search_item');	
	Route::get('/get_item/{id}', [ItemsController::class, 'getItem'])->name('admin.get_item');	
	
	/*------------ Cetegory ------------*/
	Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
	Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('admin.add_category');
	Route::post('/save_category', [CategoryController::class, 'saveCategory'])->name('admin.savecategory');
	Route::get('/edit_category/{id}', [CategoryController::class, 'editCategory'])->name('admin.edit_category');
	Route::post('/update_category', [CategoryController::class, 'updateCategory'])->name('admin.updatecategory');
	Route::get('/categories_data', [CategoryController::class, 'categoriesData'])->name('admin.categories_data');
	Route::get('/delete_category/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.delete_category');
	
	
    /*------------ Generate Bill ------------*/
    Route::get('/generate-bill', [GenerateBillController::class, 'index'])->name('admin.Generate_bill');
    Route::post('/save_cart', [GenerateBillController::class, 'saveCart'])->name('admin.save_cart');
    Route::get('/cart/{id}', [GenerateBillController::class, 'getCart'])->name('admin.cart');
    Route::get('/remove_cart_item/{id}/{cartid}', [GenerateBillController::class, 'removeCartItem'])->name('admin.remove_cart_item');
	Route::post('/update_cart/{id}', [GenerateBillController::class, 'updateCart'])->name('admin.update_cart');
	Route::get('/checkout/{id}', [GenerateBillController::class, 'getCheckout'])->name('admin.checkout');
	Route::post('/place_order/{id}', [GenerateBillController::class, 'placeOrder'])->name('admin.place_order');
	
	/*------------ Payment ------------*/
    Route::get('/payment', [PaymentController::class, 'index'])->name('admin.payment');
	
	/*------------ Order History ------------*/
    Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('admin.order_history');
	Route::get('/order-history/1', [OrderViewController::class, 'index'])->name('admin.order_view');
	
	/*---sate---*/	
	Route::get('/states/{id}', [CustomerController::class, 'getState'])->name('admin.states');
	
});


