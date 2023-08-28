<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register');
Route::get('/magnitude', [App\Http\Controllers\MagnitudeController::class, 'magnitude'])->name('magnitude');
Route::get('/magnitude/export', [App\Http\Controllers\MagnitudeController::class, 'export'])->name('magnitude.export');
Route::get('/frequency', [App\Http\Controllers\FrequencyController::class, 'frequency'])->name('frequency');
Route::get('/frequency /export', [App\Http\Controllers\FrequencyController::class, 'export'])->name('frequency.export');
Route::get('/analytic', [App\Http\Controllers\AnalyticController::class, 'analytic'])->name('analytic');
Route::get('/forgotpassword', [App\Http\Controllers\ForgotPasswordController::class, 'forgotpassword'])->name('forgotpassword');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
Route::post('/updateprofile', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('updateProfile');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
Route::post('/admin/{id}/updateuser', [App\Http\Controllers\AdminController::class, 'updateuser'])->name('admin.updateuser');
Route::post('/admin/add/user', [App\Http\Controllers\AdminController::class, 'adduser'])->name('admin.adduser');
Route::post('/admin/{id}/deleteuser', [App\Http\Controllers\AdminController::class, 'deleteuser'])->name('admin.deleteuser');
Route::get('/analytic1', [App\Http\Controllers\AnalyticController::class, 'analytic1'])->name('analytic1');
Route::post('/insert-data', 'App\Http\Controllers\DataController@insertData');
Route::patch('/insert-data', 'App\Http\Controllers\DataController@insertData');
// Route::get('/cekuser/{id}', 'App\Http\Controllers\UserController@getUserRole');

Auth::routes();

Route::get('/home', function () {
    return redirect()->route('login');
});
