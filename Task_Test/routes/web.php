<?php

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
|
*/

Route::get('/',[App\Http\Controllers\HomeController::class, 'login'])->name('login');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')->middleware('auth');;

Route::get('/home/createVacation', [App\Http\Controllers\HomeController::class, 'createVacation'])
        ->name('createVacation')->middleware('auth');;
Route::post('/home/createVacationsSubmitAdmin', [App\Http\Controllers\HomeController::class, 'createVacationsSubmitAdmin'])
    ->name('createVacationsSubmitAdmin')->middleware('auth');;

Route::get('/home/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])
    ->name('adminEdit')->middleware('auth');;
Route::post('/home/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])
    ->name('update')->middleware('auth');;
