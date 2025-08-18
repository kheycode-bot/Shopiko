<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'ShopPage'])->name('user.shop');
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('user.contact');
Route::get('/product_details/{id}', [HomeController::class, 'ProductDetails']);
Route::get('/top-testimonials', [FeedbackController::class, 'getTopTestimonials']);

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, 'create'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, 'verify'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
        Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, 'verify'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    
});


Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/shop', [HomeController::class, 'ShopPage'])->name('user.shop');
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('user.contact');
Route::get('/product_details/{id}', [HomeController::class, 'ProductDetails']);

Route::post('/add-to-cart/{id}', [HomeController::class, 'AddToCart']);
Route::get('/remove-product-from-cart/{id}', [HomeController::class, 'RemoveProductFromCart']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'Home'])->name('dashboard');
    Route::get('/my-account', [HomeController::class, 'UserAccount'])->name('user.account');
    Route::post('/user/logout', [AuthenticatedSessionController::class, 'destroy'])->name('user.logout');
    Route::get('/my-cart', [HomeController::class, 'CartPage'])->name('user.cart');
    Route::get('/clear-cart', [HomeController::class, 'ClearCart'])->name('user.clear_cart');
    Route::get('/checkout', [HomeController::class, 'Checkout'])->name('user.checkout');
    Route::get('/orders', [HomeController::class, 'UserOrders'])->name('user.orders');
    Route::get('/order-received/{id}', [HomeController::class, 'OrderReceived']);
    Route::get('/cancel-order/{id}', [HomeController::class, 'CancelOrder']);
    Route::get('/search-a-product', [HomeController::class, 'SearchProduct']);
    Route::get('/update-password', [HomeController::class, 'UpdatePassword']);
    Route::get('/technology-news', [HomeController::class, 'GetTechnologyNews'])->name('news');
    Route::get('/cash-order', [HomeController::class, 'CashOrder']);
    Route::get('/stripe/{totalPrice}', [HomeController::class, 'Stripe']);
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');
    route::get('/view_category', [AdminController::class, 'ViewCategory'])->name('admin.category');
    route::post('/add_category', [AdminController::class, 'AddCategory'])->name('admin.add_category');
    Route::get('/delete_category/{id}', [AdminController::class, 'DeleteCategory']);
    Route::get('/show_product', [AdminController::class, 'ShowProduct'])->name('admin.show_product');
    Route::get('/show_product', [AdminController::class, 'ViewProduct'])->name('admin.show_product');
    Route::get('/add_product', [AdminController::class, 'addProductForm'])->name('admin.add_product');
    Route::post('/add_product', [AdminController::class, 'storeProduct'])->name('admin.store_product');
    route::get('/delete_product/{id}', [AdminController::class, 'DeleteProduct'])->name('admin.delete_product');
    route::get('/edit_product/{id}', [AdminController::class, 'EditProduct'])->name('admin.edit_product');
    route::post('/update_product/{id}', [AdminController::class, 'UpdateProduct']);
    Route::get('/search-product', [AdminController::class, 'SearchProduct']);
    Route::get('/search-order', [AdminController::class, 'SearchOrder'])->name('SearchOrder');
    route::get('/user-orders', [AdminController::class, 'UserOrders'])->name('admin.user_orders');
    route::get('/update-order/{user_id}/{order_id}/{delivery_status}', [AdminController::class, 'UpdateOrder']);
    Route::get('print-bill/{orderId}', [OrderController::class, 'printBill'])->name('order.printBill');
    route::get('/customers', [AdminController::class, 'Customers']);
    route::get('/delete-user/{id}', [AdminController::class, 'DeleteUser']);
    Route::get('/search-user', [AdminController::class, 'SearchUser']);


});

