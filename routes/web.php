<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login/authenticate', [LoginController::class, 'login'])->name('admin.authenticate');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('adminlogout');

Route::middleware(['ceklogin'])->prefix('admin')->group(function() {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/bukutamu', [GuestController::class, 'index'])->name('guest.index');
    Route::post('/bukutamu/store', [GuestController::class, 'store'])->name('guest.store');

    Route::get('/kategori',[CategoryController::class, 'index'])->name('category.index');
    Route::post('/kategori/store',[CategoryController::class, 'store'])->name('category.store');
});
