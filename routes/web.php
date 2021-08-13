<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConfigController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    if(session()->has('email')){
        return redirect()->route('dashboard');
    }else{
        return view('admin.login');
    }
})->name('login');

Route::post('/login', [LoginController::class, 'checkUser']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

Route::group([ 'prefix' => 'shop.admin', 'middleware'=>'CheckLogin'], function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('language/{language}', [LanguageController::class, 'changeLanguage'])->name('change-language');
    
    Route::prefix('product')->group (function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/create', [ProductController::class, 'create'])->name('create-product');
        Route::post('/add', [ProductController::class, 'store'])->name('add-product');
        Route::get('/show', [ProductController::class, 'show'])->name('show-product');
        Route::post('/update', [ProductController::class, 'update'])->name('update-product');
        Route::get('/delete', [ProductController::class, 'destroy'])->name('delete-product');
        Route::get('/filter/{cat_id}', [ProductController::class, 'filter'])->name('filter-product');
        Route::get('/search', [ProductController::class, 'search'])->name('search-product');
    });
    
    Route::prefix('category')->group (function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/create', [CategoryController::class, 'create'])->name('create-category');
        Route::post('/store', [CategoryController::class, 'store'])->name('store-category');
        Route::get('/show', [CategoryController::class, 'show'])->name('show-category');
        Route::post('/update', [CategoryController::class, 'update'])->name('update-category');
        Route::get('/delete', [CategoryController::class, 'destroy'])->name('delete-category');
    });
    
    Route::group (['prefix' => 'user', 'middleware' => 'checkAdmin'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/add', [UserController::class, 'create'])->name('add-user');
        Route::post('/store', [UserController::class, 'store'])->name('store-user');
        Route::get('/show', [UserController::class, 'show'])->name('show-user');
        Route::post('/update', [UserController::class, 'update'])->name('update-user');
        Route::get('/delete', [UserController::class, 'destroy'])->name('delete-user');
    });

    Route::prefix('order')->group (function () {
        Route::get('/', [OrderController::class, 'index'])->name('order');
        Route::get('/detail', [OrderController::class, 'detail'])->name('detail-order');
        // _____________
        Route::get('/create', [OrderController::class, 'create'])->name('create-order');
        Route::post('/store', [OrderController::class, 'store'])->name('store-order');
        Route::post('/update', [OrderController::class, 'update'])->name('update-order');
        Route::get('/delete', [OrderController::class, 'destroy'])->name('delete-order');
    });

    Route::prefix('customer')->group (function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer');
        Route::get('/history', [CustomerController::class, 'history'])->name('history-customer');
        // ____________
        Route::get('/create', [CustomerController::class, 'create'])->name('create-customer');
        Route::post('/store', [CustomerController::class, 'store'])->name('store-customer');
        Route::get('/show', [CustomerController::class, 'show'])->name('show-customer');
        Route::post('/update', [CustomerController::class, 'update'])->name('update-customer');
        Route::get('/delete', [CustomerController::class, 'destroy'])->name('delete-customer');
    });
    Route::prefix('config')->group (function () {
        Route::get('/', [ConfigController::class, 'index'])->name('config');
        Route::get('/show', [ConfigController::class, 'show'])->name('show-config');
        Route::post('/update', [ConfigController::class, 'update'])->name('update-config');

    });
});

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/search', [FrontendController::class, 'search'])->name('front.search');
Route::get('/product', [FrontendController::class, 'product'])->name('front.product');
Route::get('/category', [FrontendController::class, 'category'])->name('front.category');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/cart/store', [CartController::class, 'storeCart'])->name('cart.store');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/order', [CartController::class, 'order'])->name('cart.order');






