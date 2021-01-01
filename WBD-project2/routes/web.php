<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index',[ProductController::class,'index'])->name('index');
Route::get('/create',[ProductController::class,'create'])->name('create');
Route::post('/create',[ProductController::class,'store'])->name('store');
Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
Route::post('/edit/{id}',[ProductController::class,'update'])->name('update');
Route::get('/active',[ProductController::class,'active'])->name('active');
Route::get('/in-active',[ProductController::class,'inActive'])->name('inActive');
Route::get('/thong-ke',[ProductController::class,'thongke'])->name('thongke');

