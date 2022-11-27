<?php
use App\Http\Controllers\almacenController;
use App\Http\Controllers\logController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SeguridadController;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/perfil', function () {
    return view('auth.perfil');
});


Route::resource('almacen',almacenController::class);


Route::resource('seguridad',SeguridadController::class);

Route::resource('user',UserController::class);

Route::resource('log',logController::class);

Route::resource('perfil',PerfilController::class);
