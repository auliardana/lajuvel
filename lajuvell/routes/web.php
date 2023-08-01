<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PurchaseController;



use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\MemberMiddleware;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Login routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// Register routes
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

// Logout route
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Admin Routes
Route::group(['middleware' => 'admin'], function () {
    // Your admin routes go here
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Create Product
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');

    // Show Product
    
    // Edit Product
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');

    // Delete Product
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    

});

// Member Routes
Route::group(['middleware' => 'member'], function () {
    // Your member routes go here

});

Route::get('/index', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

//cart
Route::get('/cart', [CartController::class, 'create'])->name('carts.create');
// POST route for adding a product to the cart with productId as a URL parameter
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart/view/{user_id}', [CartController::class, 'viewCart'])->name('carts.view');
Route::put('/cart/update/{cart_id}', [CartController::class, 'updateCart'])->name('carts.update');
Route::delete('/cart/remove/{cart_id}', [CartController::class, 'removeFromCart'])->name('carts.remove');

//purchase
Route::get('/purchase', [CartController::class, 'create'])->name('purchase');

// Route to show the payment form
Route::get('/payment/form', [PurchaseController::class, 'showPaymentForm'])->name('payment.form');

// Route to process the payment form submission
Route::post('/payment/process', [PurchaseController::class, 'processPayment'])->name('payment.process');