<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::post('login',[UserController::class,'login'])->name('user.login');
Route::post('register',[UserController::class,'register'])->name('user.register');

Route::get('products',[ProductController::class,'index'])->name('products.index');
Route::get('product/{id}',[ProductController::class,'productDetails'])->name('product.details');
Route::get('search',[ProductController::class,'searchProduct'])->name('product.search');

