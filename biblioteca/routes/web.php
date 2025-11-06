<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PrestamoController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas con controladores resource
Route::resource('usuarios', UsuarioController::class);
Route::resource('libros', LibroController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('prestamos', PrestamoController::class);
Route::patch('prestamos/{prestamo}/devuelto', [PrestamoController::class, 'marcarDevuelto'])
    ->name('prestamos.marcar-devuelto');