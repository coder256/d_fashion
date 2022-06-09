<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.home');

Route::resource('dashboard/users', UserController::class)->middleware(['auth']);

Route::resource('dashboard/products', ProductController::class)->middleware(['auth']);

Route::get('/search', [HomeController::class, 'search'])->name('home.search');