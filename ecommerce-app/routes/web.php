<?php


use App\Http\Middleware\CheckOwner;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\OrderDetailController;

// Rest of the code...

// Simulated feedback data

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get(
    '/orders/confirmation/{order_id}',
    [OrderController::class, 'showConfirmation']
)->name('orders.confirmation');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('send_email', [EmailController::class, 'store'])->name('email.store');

require __DIR__ . '/auth.php';
// Profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/order-details', [OrderDetailController::class, 'index'])->name('order-details.index');
    Route::get('/order-details/{orderDetail}', [OrderDetailController::class, 'show'])->name('order-details.show');
    Route::put('/order-details/{orderDetail}', [OrderDetailController::class, 'update'])->name('order-details.update');

    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    Route::post('/cart/add', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/removeItem', [CartController::class, 'removeItem'])->name('cart.removeItem');

    Route::post('/address/add', [UserAddressController::class, 'store'])->name('address.new');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    require __DIR__ . '/admin/dashboard.php';
});

Route::middleware(['auth', 'admin'])->prefix('admin/crud')->group(function () {
    require __DIR__ . '/admin/users.php';
    require __DIR__ . '/admin/products.php';
    require __DIR__ . '/admin/categories.php';
});

Route::middleware(['auth', 'admin'])->prefix('admin/crud')->group(function () {
    require __DIR__ . '/admin/users.php';
    // require __DIR__ . '/admin/categories.php';
    require __DIR__ . '/admin/products.php';
});

Route::get('/products', [CategoryController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/language/{lang}', [LanguageController::class, 'changeLanguage'])->name('locale');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('google-callback');

Route::middleware(['auth'])->group(function () {
    Route::get('/review/create', [UserReviewController::class, 'create'])->name('review.create');
    Route::post('/review', [UserReviewController::class, 'store'])->name('review.store');
    Route::middleware([CheckOwner::class])->group(function () {
        Route::get('review/edit/{id}', [UserReviewController::class, 'edit'])->name('review.edit');
        Route::put('/review/{id}', [UserReviewController::class, 'update'])->name('review.update');
        Route::delete('/review/{id}', [UserReviewController::class, 'destroy'])->name('review.destroy');
    });
});

