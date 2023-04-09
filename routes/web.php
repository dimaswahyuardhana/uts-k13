<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view('dashboard');
});
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/add', [CategoryController::class, 'create']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/add', [ProductController::class, 'create']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/transaction', [TransactionController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::post('/register', [AuthController::class, 'doRegister'])->name('do.register');
Route::post('/login', [AuthController::class, 'doLogin'])->name('do.login');


