<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\weatherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Customer;
use App\Http\Controllers\City;
use App\Http\Controllers\FileUploadController;


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
    return view('home');
});
Route::get('weather',[weatherController::class,'index'])->name('weather');
Route::get('weather/{city}',[weatherController::class,'change']);

Route::get('/login',[userController::class,'login'])->name('login');
Route::post('/login',[userController::class,'checklogin'])->name('checklogin');
Route::middleware('auth')->prefix('user')->group(function(){
    Route::get('/logout',[userController::class,'logout'])->name('user.logout');
    Route::get('/',[UserController::class,'index'])->name('user.index');
    Route::get('/create',[UserController::class,'create'])->name('user.create');
    Route::post('/create',[UserController::class,'store'])->name('user.store');
    Route::get('/{id}/edit',[UserController::class,'edit'])->name('user.edit');
    Route::post('/{id}/edit',[UserController::class,'update'])->name('user.update');
    Route::get('/{id}/destroy',[UserController::class,'destroy'])->name('user.destroy');
    Route::get('/search',[UserController::class,'search'])->name('user.search');
});
Route::prefix('customer')->group(function(){
    Route::get('/',[CustomerController::class,'index'])->name('customers.index');
    Route::get('/create',[CustomerController::class,'create'])->name('customers.create');
    Route::post('/create',[CustomerController::class,'store'])->name('customers.store');
    Route::get('/{id}/edit',[CustomerController::class,'edit'])->name('customers.edit');
    Route::post('/{id}/edit',[CustomerController::class,'update'])->name('customers.update');
    Route::get('/{id}/destroy',[CustomerController::class,'destroy'])->name('customers.destroy');
    Route::get('/filter',[CustomerController::class,'filterByCity'])->name('customers.filterByCity');
    Route::get('/search',[CustomerController::class,'search'])->name('customers.search');
});
Route::prefix('city')->group(function(){
   Route::get('/',[CityController::class,'index'])->name('Cities.index');
   Route::get('/create',[CityController::class,'create'])->name('Cities.create');
   Route::post('/create',[CityController::class,'store'])->name('Cities.store');
   Route::get('/{id}/edit',[CityController::class,'edit'])->name('Cities.edit');
   Route::post('/{id}/edit',[CityController::class,'update'])->name('Cities.update');
   Route::get('/{id}/delete',[CityController::class,'destroy'])->name('Cities.delete');

});
Route::prefix('role')->group(function(){
    Route::get('/',[RoleController::class,'index'])->name('role.index');
    Route::get('/create',[RoleController::class,'create'])->name('role.create');
    Route::post('/create',[RoleController::class,'store'])->name('role.store');
    Route::get('/{id}/edit',[RoleController::class,'edit'])->name('role.edit');
    Route::post('/{id}/edit',[RoleController::class,'update'])->name('role.update');
    Route::get('/{id}/delete',[RoleController::class,'destroy'])->name('role.delete');

});
Route::get('/product',[ProductController::class,'index']);


    Route::get('/cart',[CartController::class,'showCart'])->name('cart.showCart');
    Route::get('/{id}/add-to-cart',[CartController::class,'addToCart'])->name('cart.addToCart');
//    Route::get('/cart',[CartController::class,'showCart'])->name('cart.showCart');
    Route::get('/remove/{id}/',[CartController::class,'remove'])->name('delete-cart');
    Route::get('/{id}/update/{quantity}',[CartController::class,'update'])->name('update-cart');
    Route::get('/clear',[CartController::class,'clear'])->name('clear-cart');




Route::get('file-upload', [ FileUploadController::class, 'fileUpload' ])->name('file.upload');

Route::post('file-upload', [ FileUploadController::class, 'fileUploadPost' ])->name('file.upload.post');
