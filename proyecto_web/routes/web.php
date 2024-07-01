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
    Route::put('/usuarios/{email}/desban', [UsuariosController::class, 'desban'])->name('usuarios.desban');
    Route::put('/usuarios/{email}/update-me', [UsuariosController::class, 'updateMe'])->name('usuarios.updateMe');
    Route::get('/usuarios/logout',[UsuariosController::class,'logout'])->name('usuarios.logout');
});
Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::post('/usuarios/autenticar',[UsuariosController::class,'autenticar'])->name('usuarios.autenticar');
Route::resource('/usuarios',UsuariosController::class)->middleware('auth');

//Vehiculos
Route::put('/vehiculos/{patente}', [VehiculosController::class, 'updateEstado'])->name('vehiculos.updateEstado');
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
