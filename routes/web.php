<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

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

Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('usuario.create');

Route::post('usuarios', [App\Http\Controllers\HomeController::class, 'store'])->name('usuarios.store');

Route::get('usuario/{usuario}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('usuarios.edit');

Route::put('usuarios/{usuario}', [App\Http\Controllers\HomeController::class, 'update'])->name('usuarios.update');

Route::get('usuarios/{usuario}/destroy',[App\Http\Controllers\HomeController::class, 'destroy'])->name('usuarios.destroy');