<?php

use App\Models\Concerts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConcertsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// // Route::get('/admin', function () {
//     return view('layout.admin');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')
    ->group(function () {
        // Route to show the admin dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        // Route to show the tour package page
        Route::resource('concert', ConcertsController::class);
        // // Route to show the gallery page
        Route::resource('gallery', GalleryController::class);
        // // Route to show the transaction page
        Route::resource('transaction', TransactionController::class);
    });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
