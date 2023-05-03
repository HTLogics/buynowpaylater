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
use App\Http\Controllers\Frontend\TermsConditionsController;
use App\Http\Controllers\Frontend\SupportController;

//admin
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\GenerateBillController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\OrderHistoryController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class, 'index'])->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/outwear', [OutwearController::class, 'index'])->name('outwear');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/contact_submit', [ContactController::class, 'submitContact'])->name('contact_submit');
Route::get('/login', [LoginFrontController::class, 'index'])->name('login');
Route::get('/forgot', [ForgotPasswordController::class, 'index'])->name('forgot');
Route::get('/support', [SupportController::class, 'index'])->name('support');
Route::get('/terms-and-conditions', [TermsConditionsController::class, 'index'])->name('terms');




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
	
	Route::get('/create_plan/{customer_id}/{cart_id}/{amount}', [GenerateBillController::class, 'createPlan'])->name('admin.create_plan');
	Route::post('/save_plan', [GenerateBillController::class, 'savePlan'])->name('admin.save_plan');
	
	Route::get('/create_subscription/{plan_id}/{customer_id}/{cart_id}', [GenerateBillController::class, 'createSubscription'])->name('admin.create_subscription');
	Route::post('/save_subscription', [GenerateBillController::class, 'saveSubscription'])->name('admin.save_subscription');
	Route::get('/get_subscriptions_select', [GenerateBillController::class, 'getSubscriptionsSelect'])->name('admin.get_subscriptions_select');
	Route::get('/get_subscription_data', [GenerateBillController::class, 'getSubscriptionData'])->name('admin.get_subscription_data');
	
	Route::get('/collect_payment/{id}', [GenerateBillController::class, 'paymentCollect'])->name('admin.payment_collect');
	Route::get('/payment_response', [GenerateBillController::class, 'paymentResponse'])->name('admin.payment_response');
	
	Route::get('/pause_subscription/{id}', [GenerateBillController::class, 'pauseSubscription'])->name('admin.pause_subscription');
	Route::get('/resume_subscription/{id}', [GenerateBillController::class, 'resumeSubscription'])->name('admin.resume_subscription');
	
	
	
	
	
	/*test*/
	Route::get('/razor', [GenerateBillController::class, 'razorTest'])->name('admin.razor');
	Route::get('/test_create_plan', [GenerateBillController::class, 'create_plan'])->name('admin.test_create_plan');
	Route::get('/create_sub', [GenerateBillController::class, 'create_sub'])->name('admin.create_sub');
	Route::post('/razor_pay', [GenerateBillController::class, 'razorResponse'])->name('admin.razor_response');
	
	/*------------ Payment ------------*/
    Route::get('/payment', [PaymentController::class, 'index'])->name('admin.payment');
	
	/*------------ Order History ------------*/
    Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('admin.order_history');
    Route::get('/order_data', [OrderHistoryController::class, 'orderData'])->name('admin.order_data');
	Route::get('/order_view/{id}', [OrderHistoryController::Class, 'viewOrder'])->name('admin.order_view');
	
	/*------------ state ------------*/
	Route::get('/states/{id}', [CustomerController::class, 'getState'])->name('admin.states');
	
});


