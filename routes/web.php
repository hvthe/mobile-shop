<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('admin.dashboard');
})->name('index');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::prefix('product')->group (function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/create', [ProductController::class, 'create'])->name('create-product');
    Route::post('/add', [ProductController::class, 'store'])->name('add-product');
    Route::get('/show', [ProductController::class, 'show'])->name('show-product');
    Route::post('/update', [ProductController::class, 'update'])->name('update-product');
    Route::get('/delete', [ProductController::class, 'destroy'])->name('delete-product');
});

Route::prefix('category')->group (function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::get('/create', [CategoryController::class, 'create'])->name('create-category');
    Route::post('/store', [CategoryController::class, 'store'])->name('store-category');
    Route::get('/show', [CategoryController::class, 'show'])->name('show-category');
    Route::post('/update', [CategoryController::class, 'update'])->name('update-category');
    Route::get('/delete', [CategoryController::class, 'destroy'])->name('delete-category');
});

Route::prefix('user')->group (function () {
    Route::get('/', function () {
        return view('admin.modules.user.user');})->name('user');
    Route::get('/add', function () {
        return view('admin.modules.user.add_user');})->name('add-user');
    Route::get('/show', function () {
        return view('admin.modules.user.edit_user');})->name('show-user');
});



