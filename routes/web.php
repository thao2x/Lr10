<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Ajax\LocationController;

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

Route::get('/', function () {
    return view('backend.auth.login');
});

/* BACKEND ROUTER */
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('user')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('user.index');
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.edit');
        Route::put('update/{id}', [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.update');
    });

});

/* AJAX */
Route::middleware(['auth'])->group(function () {
    Route::get('/location/getDistrict', [LocationController::class, 'getDistrict'])->name('district.index');
    Route::get('/location/getWard', [LocationController::class, 'getWard'])->name('ward.index');
});

Route::get('/admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
