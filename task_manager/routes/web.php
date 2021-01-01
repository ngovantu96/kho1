<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
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
    return view('wellcom');
});

Route::resource('tashs',TashController::class);


Route::get('/',[CustomerController::class,'index'])->name('index');
    // Hiển thị danh sách khách hàng


Route::get('/create',[CustomerController::class,'create'])->name('create');
Route::view('show',[CustomerController::class, 'show'])->name('show');

//$perfixCustomer = 'customer';
//Route::prefix($perfixCustomer)->group(function () {
//
//    Route::view('index', 'index');
//    Route::view('create', 'create')->name('create');
//    Route::view('show',[CustomerController::class, 'show'])->name('show');

//    Route::get('create', function () {
//        // Hiển thị Form tạo khách hàng
//        return view ('create');
//    })->name('create');
//
//    Route::post('store', function () {
//        // Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form
//    });
//
//    Route::get('{id}/show', function ($id) {
//        // Hiển thị thông tin chi tiết khách hàng có mã định danh id
//        return view ('show'.$id);
//    });
//
//    Route::get('{id}/edit', function () {
//        // Hiển thị Form chỉnh sửa thông tin khách hàng
//    });
//
//    Route::patch('{id}/update', function () {
//        // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form
//    });
//
//    Route::delete('{id}', function () {
//        // Xóa thông tin dữ liệu khách hàng
//    });
//});


