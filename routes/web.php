<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;
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



Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/register', [AdminController::class, 'register'])->name('register');


Route::get('/', [HomeController::class, 'index'])->name('main');


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
