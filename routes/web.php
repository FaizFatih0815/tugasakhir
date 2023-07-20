<?php

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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register');
Route::get('/magnitude', [App\Http\Controllers\MagnitudeController::class, 'magnitude'])->name('magnitude');
Route::get('/frequency', [App\Http\Controllers\FrequencyController::class, 'frequency'])->name('frequency');
Route::get('/analytic', [App\Http\Controllers\AnalyticController::class, 'analytic'])->name('analytic');
Route::get('/forgotpassword', [App\Http\Controllers\ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword');
