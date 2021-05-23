<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserTableController;
use App\Http\Controllers\SaleController;
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


Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/search/', [ProductController::class, 'search'])->name('search');
Route::get('/home', function () {
    return redirect('index');
});


Route::resource('home', HomeController::class);
Route::resource('orders', OrderController::class);
Route::resource('sales', SaleController::class);
Route::resource('carts', OrderProductController::class);
Route::resource('products', ProductController::class);
Route::resource('profile', ProfileController::class);
Route::resource('users', UserTableController::class);
Route::get('/categories/laptop',  [CategoryController::class, 'laptop']);
Route::get('/categories/desktop',  [CategoryController::class, 'desktop']);
Route::get('/categories/component',  [CategoryController::class, 'component']);
Route::get('/aboutus',  [HomeController::class, 'aboutus']);


Auth::routes(['verify' => true]);

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth', 'PreventBackHistory']], function() {
    Route::get('dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
});


Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth', 'PreventBackHistory']], function() {
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
});
