<?php
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|settingscategories
*/

Route::get('/', function () {
    return view('frontend.home.index');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'redirect']);
Route::middleware(['auth', 'user.access:user'])->group(function () {

Route::get('/user/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user.access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminIndex'])->name('admin.home');
    Route::resource('/admin/categories', CategoriesController::class);
    Route::resource('/admin/products', ProductController::class);
});


