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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::post('/establecimiento/store', [App\Http\Controllers\EstablecimientoController::class, 'store'])->name('establecimiento.store');
    Route::get('/establecimiento/create', [App\Http\Controllers\EstablecimientoController::class, 'create'])->name('establecimiento.create');
    Route::delete('/establecimiento/destroy/{establecimiento}', [App\Http\Controllers\EstablecimientoController::class, 'destroy'])->name('establecimiento.destroy');
    Route::get('/establecimiento/edit/{establecimiento}', [App\Http\Controllers\EstablecimientoController::class, 'edit'])->name('establecimiento.edit');
    Route::put('/establecimiento/update/{id}', [App\Http\Controllers\EstablecimientoController::class, 'update'])->name('establecimiento.update');
    Route::get('/establecimiento/index', [App\Http\Controllers\EstablecimientoController::class, 'index'])->name('establecimiento.index');
});