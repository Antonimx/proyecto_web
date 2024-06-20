<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\VehiculosController;

<<<<<<< HEAD
//Home
Route::get('/',[HomeController::class,'index'])->name('home.index')->middleware('auth');

//Usuarios
Route::middleware(['auth'])->group(function(){
    Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
    Route::get('/usuarios/password',[UsuariosController::class,'password'])->name('usuarios.password');
    Route::get('/usuarios/crear',[UsuariosController::class,'create'])->name('usuarios.create');
    Route::get('/usuarios/logout',[UsuariosController::class,'logout'])->name('usuarios.logout');
=======
Route::get('/', function () {
    return view('home.index');
>>>>>>> origin/main
});
Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::post('/usuarios/autenticar',[UsuariosController::class,'autenticar'])->name('usuarios.autenticar');

//Vehiculos
Route::resource('/vehiculos',VehiculosController::class)->middleware('auth');
Route::resource('/tipos',TiposController::class)->middleware('auth');
Route::resource('/perfiles',PerfilesController::class)->middleware('auth');