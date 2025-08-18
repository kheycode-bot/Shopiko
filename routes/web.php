<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderConfirmation;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'ShopPage'])->name('user.shop');
Route::get('/search-products', [HomeController::class, 'SearchProduct'])->name('search.products');
Route::get('/products', [HomeController::class, 'showProducts'])->name('user.products');
Route::get('/products/{id}', [HomeController::class, 'showProductDetails'])
     ->name('product.details')
     ->where('id', '[0-9]+');

Route::get('/categories/{id}', [HomeController::class, 'showCategoryProducts'])
     ->name('category.products')
     ->where('id', '[0-9]+');


Route::get('/gifts', [HomeController::class, 'showGifts'])->name('category.gifts');
Route::get('/apparel', [HomeController::class, 'showApparel'])->name('category.apparel');
Route::get('/photos', [HomeController::class, 'showPhotos'])->name('category.photos');
Route::get('/accessories', [HomeController::class, 'showAccessories'])->name('category.accessories');
Route::get('/home_decor', [HomeController::class, 'showHomeDecor'])->name('category.home_decor');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);



Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, 'create'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, 'verify'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');    
});


Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout')
    ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');




Route::match(['get', 'post'], '/user/logout', [AuthenticatedSessionController::class, 'destroy'])->name('user.logout');

Route::get('/shop', [HomeController::class, 'ShopPage'])->name('user.shop');
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('user.contact');
Route::get('/inspirations', [HomeController::class, 'inspirations'])->name('inspirations');
Route::get('/feedback', [HomeController::class, 'feedback'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'store']);
Route::get('/featured-testimonials', [FeedbackController::class, 'getFeaturedTestimonials']);
Route::get('/filter-products', function(Request $request) {
    try {
        $category = $request->input('category', 'all');
        $maxPrice = $request->input('max_price', 500);
        $searchTerm = $request->input('search', '');
        
        $query = App\Models\Product::query();
        
        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }
        
        if ($maxPrice) {
            $query->where(function($q) use ($maxPrice) {
                $q->where('discount_price', '<=', $maxPrice)
                  ->orWhere(function($q2) use ($maxPrice) {
                      $q2->whereNull('discount_price')
                         ->where('price', '<=', $maxPrice);
                  });
            });
        }
        
        if ($searchTerm) {
            $query->where('title', 'like', '%'.$searchTerm.'%');
        }
        
        $products = $query->get();
        
        return view('user.products', ['products' => $products]);
        
    } catch (\Exception $e) {
        \Log::error('Filter products error: ' . $e->getMessage());
        return response()->json(['error' => 'Server error'], 500);
    }
})->name('filter.products');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'Home'])->name('dashboard');
    Route::get('/my-account', [HomeController::class, 'UserAccount'])->name('user.account');
    Route::post('/user/logout', [AuthenticatedSessionController::class, 'destroy'])->name('user.logout');
    Route::post('/add-to-cart/{id}', [HomeController::class, 'AddToCart'])->name('add.to.cart');
    Route::get('/cart', [HomeController::class, 'CartPage'])->name('user.cart');
    Route::get('/cart/count', [HomeController::class, 'getCartCount'])->name('cart.count');
    Route::get('/clear-cart', [HomeController::class, 'ClearCart'])->name('user.clear_cart');
    Route::get('/checkout', [HomeController::class, 'Checkout'])->name('user.checkout');
    Route::get('/orders', [HomeController::class, 'UserOrders'])->name('user.orders');
    Route::get('/order-received/{id}', [HomeController::class, 'OrderReceived']);
    Route::get('/cancel-order/{id}', [HomeController::class, 'CancelOrder']);
    Route::get('/update-password', [HomeController::class, 'UpdatePassword']);
    Route::get('/technology-news', [HomeController::class, 'GetTechnologyNews'])->name('news');
    Route::post('/cash-order', [HomeController::class, 'CashOrder'])->name('cash.order');
    Route::get('/stripe/{totalPrice}', [HomeController::class, 'Stripe']);
    Route::delete('remove-product-from-cart/{id}', [HomeController::class, 'RemoveProductFromCart'])
    ->name('remove.cart.item');
    Route::post('/update-cart-item/{id}', [HomeController::class, 'updateCartItem'])->name('update.cart.item');
    Route::post('/stripe/{amount}', [StripePaymentController::class, 'stripePost'])
    ->name('stripe.post');
    Route::get('/order-confirmation/{id}', [HomeController::class, 'showOrderConfirmation'])
     ->name('order.confirmation');
});





Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');
    route::get('/view_category', [AdminController::class, 'ViewCategory'])->name('admin.category');
    route::post('/add_category', [AdminController::class, 'AddCategory'])->name('admin.add_category');
    Route::delete('/delete_category/{id}', [AdminController::class, 'DeleteCategory'])->name('admin.delete_category');
    Route::get('/show_product', [AdminController::class, 'ViewProduct'])->name('admin.show_product');
    Route::get('/show_product', [AdminController::class, 'ShowProduct'])->name('admin.show_product');
    Route::get('/view-product/{id}', [AdminController::class, 'ViewProduct'])->name('admin.view_product');
    Route::get('/add_product', [AdminController::class, 'addProductForm'])->name('admin.add_product');
    Route::post('/add_product', [AdminController::class, 'storeProduct'])->name('admin.store_product');
    route::get('/delete_product/{id}', [AdminController::class, 'DeleteProduct'])->name('admin.delete_product');
    route::get('/edit_product/{id}', [AdminController::class, 'EditProduct'])->name('admin.edit_product');
    Route::post('/update-product/{id}', [AdminController::class, 'UpdateProduct'])->name('admin.update_product');
    Route::get('/search-product', [AdminController::class, 'SearchProduct']);
    Route::get('/orders', [AdminController::class, 'viewOrders'])->name('admin.orders');
    Route::get('/search-order', [AdminController::class, 'SearchOrder'])->name('SearchOrder');
    Route::get('/print-bill/{id}', [OrderController::class, 'printBill'])->name('order.printBill');
    Route::get('/user-orders', [AdminController::class, 'UserOrders'])->name('admin.user_orders');
    route::get('/update-order/{user_id}/{order_id}/{delivery_status}', [AdminController::class, 'UpdateOrder']);
    Route::get('print-bill/{orderId}', [OrderController::class, 'printBill'])->name('order.printBill');
    route::get('/customers', [AdminController::class, 'Customers']);
    route::get('/delete-user/{id}', [AdminController::class, 'DeleteUser']);
    Route::get('/product/search', [AdminController::class, 'SearchProduct'])->name('admin.search_product');
    Route::get('/search-user', [AdminController::class, 'SearchUser']);
    Route::put('/admin/orders/{id}/approve', [AdminController::class, 'approveOrder'])->name('admin.approveOrder');
    Route::delete('/admin/orders/{id}', [AdminController::class, 'deleteOrder'])->name('admin.deleteOrder');
    Route::put('/admin/orders/{id}/decline', [AdminController::class, 'declineOrder'])->name('admin.declineOrder');
    Route::put('/admin/orders/{id}/deliver', [AdminController::class, 'deliverOrder'])->name('admin.deliverOrder');
    Route::get('/inventory', [AdminController::class, 'showInventory'])->name('admin.inventory');
    Route::post('/inventory/{id}/update-stock', [AdminController::class, 'updateStock'])->name('admin.update.stock');
    Route::get('/inventory/{id}/history', [AdminController::class, 'stockHistory'])->name('admin.stock.history');
    Route::get('/testimonials', [AdminController::class, 'manageTestimonials'])->name('admin.testimonials');
    Route::post('/testimonials/{id}/approve', [AdminController::class, 'approveTestimonial'])->name('admin.testimonials.approve');
    Route::delete('/testimonials/{id}', [AdminController::class, 'deleteTestimonial'])->name('admin.testimonials.delete');
});
