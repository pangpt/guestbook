<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestController;

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

Route::prefix('admin')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/bukutamu', [GuestController::class, 'index'])->name('guest.index');
    Route::post('/bukutamu/store', [GuestController::class, 'store'])->name('guest.store');

    Route::get('/kategori',[CategoryController::class, 'index'])->name('category.index');
    Route::post('/kategori/store',[CategoryController::class, 'store'])->name('category.store');
});
