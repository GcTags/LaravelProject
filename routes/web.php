<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/home', function () {
    return redirect('index');
});

//Purchased Function
Route::resource('orders', OrderController::class);
//Wish Listing Cart Functions
Route::resource('carts', OrderProductController::class);


//

//Viewing
Route::resource('products', ProductController::class);
Route::resource('home',HomeController::class);


Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth', 'PreventBackHistory']], function() {
    Route::get('dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
});


Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth', 'PreventBackHistory']], function() {
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
});
