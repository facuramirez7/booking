<?php

use App\Http\Controllers\ReservedController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/bookings', [ReservedController::class, 'index'])->name('index');
Route::get('/reserve', [ReservedController::class, 'create'])->name('create');
Route::post('/reserve/store', [ReservedController::class, 'store'])->name('store');
