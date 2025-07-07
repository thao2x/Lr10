<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AuthController;
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

Route::get('/home', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('guest');