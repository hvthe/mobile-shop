<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

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

Route::group(['namespace' => 'ProductController'], function () {
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/create-product', [ProductController::class, 'create'])->name('create-product');
    Route::post('/add-product', [ProductController::class, 'store'])->name('add-product');
    Route::get('/show-product', [ProductController::class, 'show'])->name('show-product');
    Route::post('/update-product', [ProductController::class, 'update'])->name('update-product');
    Route::get('/delete-product', [ProductController::class, 'destroy'])->name('delete-product');
});


Route::get('/test', function (Request $request){
    dd($request->all());
});
Route::get('/category', function () {
    return view('admin.modules.category.category');
})->name('category');
Route::get('/add-category', function () {
    return view('admin.modules.category.add_category');
})->name('add-category');
Route::get('/edit-category', function () {
    return view('admin.modules.category.edit_category');
})->name('edit-category');

Route::get('/user', function () {
    return view('admin.modules.user.user');
})->name('user');
Route::get('/add-user', function () {
    return view('admin.modules.user.add_user');
})->name('add-user');
Route::get('/edit-user', function () {
    return view('admin.modules.user.edit_user');
})->name('edit-user');



