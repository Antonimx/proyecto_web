<?php

use App\Http\Controllers\ArriendosController;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\VehiculosController;



//Home
Route::get('/',[HomeController::class,'index'])->name('home.index')->middleware('auth');

//Usuarios
Route::middleware(['auth'])->group(function(){
    Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
    Route::get('/usuarios/create',[UsuariosController::class,'create'])->name('usuarios.create');
    Route::get('/usuarios/update',[UsuariosController::class,'update'])->name('usuarios.update');
    Route::get('/usuarios/{email}/edit',[UsuariosController::class,'edit'])->name('usuarios.edit');
    Route::get('/usuarios/logout',[UsuariosController::class,'logout'])->name('usuarios.logout');
});
Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::post('/usuarios/autenticar',[UsuariosController::class,'autenticar'])->name('usuarios.autenticar');

//Vehiculos
Route::resource('/vehiculos',VehiculosController::class)->middleware('auth');

//Tipos
Route::resource('/tipos',TiposController::class)->middleware('auth');

//Perfiles
Route::resource('/perfiles',PerfilesController::class)->middleware('auth');

//Arriendos
Route::middleware(['auth'])->group(function(){
    Route::get('/arriendos/gestionar',[ArriendosController::class,'gestionar'])->name('arriendos.gestionar');
    Route::get('/arriendos/create/{patente}',[ArriendosController::class,'create'])->name('arriendos.create');
    Route::resource('/arriendos',ArriendosController::class,['except'=>['create']]);
    
    
});

//Clientes
Route::resource('/clientes',ClientesController::class)->middleware('auth');
