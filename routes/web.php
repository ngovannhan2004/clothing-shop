<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCategoryController;

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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::get('/loginAdmin', [AdminController::class, 'login'])->name('login');
Route::post('/loginAdmin', [AdminController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/register', [AdminController::class, 'register'])->name('register');



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/register', [HomeController::class, 'register'])->name('register');
Route::post('/login', [HomeController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/account', [HomeController::class, 'account'])->name('account');
Route::get('/product_single', [HomeController::class, 'product'])->name('product_single');
Route::get('/shop_column', [HomeController::class, 'shop_column'])->name('shop_4_column');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
Route::get('/compare', [HomeController::class, 'compare'])->name('compare');
Route::get('/shop_sidebar', [HomeController::class, 'shop_sidebar'])->name('shop_left_sidebar');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/product_slider', [HomeController::class, 'product_slider'])->name('product_slider');
Route::get('/product_variable', [HomeController::class, 'product_variable'])->name('product_variable');
Route::get('/product_gallery', [HomeController::class, 'product_gallery'])->name('product_gallery');
Route::get('/product-details/{slug}', [HomeController::class, 'product_detail'])->name('product_details');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/404', [HomeController::class, 'error'])->name('error');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Route::get('/addCart/{product_id}/{quantity}', [CartController::class, 'create'])->name('cart.add');
    Route::get('/update/{id}', [CartController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [CartController::class, 'destroy'])->name('destroy');
    Route::get('/shop_column/addCart/{product_id}/{quantity}', [CartController::class, 'create'])->name('shop_column.cart.add');
    Route::get('/shop_siderbar/addCart/{product_id}/{quantity}', [CartController::class, 'create'])->name('shop_siderbar.cart.add');
});


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'admin']], function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('admin.products.index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('admin.products.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('admin.products.store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
        Route::get('/destroy/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [AdminMenuController::class, 'index'])->name('admin.menus.index');
        Route::get('/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');
        Route::post('/store', [AdminMenuController::class, 'store'])->name('admin.menus.store');
        Route::get('/edit/{id}', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
        Route::post('/update/{id}', [AdminMenuController::class, 'update'])->name('admin.menus.update');
        Route::get('/destroy/{id}', [AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('admin.users.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::get('/destroy/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    });
});
