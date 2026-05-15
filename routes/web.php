<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\EmprendedorController;

/*
|--------------------------------------------------------------------------
| RUTA PRINCIPAL
|--------------------------------------------------------------------------
*/

Route::get('/', [CatalogoController::class, 'inicio'])
    ->name('inicio');

/*
|--------------------------------------------------------------------------
| CATALOGO
|--------------------------------------------------------------------------
*/

Route::prefix('catalogo')->name('catalogo.')->group(function () {

    // PRODUCTOS
    Route::get('/productos', [CatalogoController::class, 'productos'])
        ->name('productos');

    // SERVICIOS
    Route::get('/servicios', [CatalogoController::class, 'servicios'])
        ->name('servicios');

    // FORMULARIO REGISTRO
    Route::get('/registro', [CatalogoController::class, 'mostrarRegistro'])
        ->name('registro.form');

    // GUARDAR REGISTRO
    Route::post('/registro', [CatalogoController::class, 'registro'])
        ->name('registro');
    // DETALLE NEGOCIO
    Route::get('/detalle-negocio/{id}',[CatalogoController::class, 'detalleNegocio'])
        ->name('detalleNegocio');

});

/*
|--------------------------------------------------------------------------
| EMPRENDEDOR
|--------------------------------------------------------------------------
*/

Route::prefix('emprendedor')->name('emprendedor.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    Route::get('/login', [EmprendedorController::class, 'login'])
        ->name('login');

    Route::post('/login', [EmprendedorController::class, 'autenticar'])
        ->name('login.auth');

    /*
    |--------------------------------------------------------------------------
    | RUTAS PROTEGIDAS
    |--------------------------------------------------------------------------
    */

    Route::middleware('emprendedor.auth')->group(function () {

        // LOGOUT
        Route::post('/logout', [EmprendedorController::class, 'logout'])
            ->name('logout');

        // DASHBOARD
        Route::get('/dashboard', [EmprendedorController::class, 'dashboard'])
            ->name('dashboard');

        // PERFIL
        Route::get('/mi-perfil', [EmprendedorController::class, 'miPerfil'])
            ->name('perfil');

        // CREAR NUEVO
        Route::get('/crear-nuevo', [EmprendedorController::class, 'crearNuevo'])
            ->name('crearNuevo');

        // GUARDAR
        Route::post('/guardar-producto', [EmprendedorController::class, 'guardarProducto'])
            ->name('guardarProducto');

        // EDITAR
        Route::get('/editar-producto/{id}', [EmprendedorController::class, 'editarProducto'])
            ->name('editarProducto');

        // ACTUALIZAR
        Route::post('/actualizar-producto/{id}', [EmprendedorController::class, 'actualizarProducto'])
            ->name('actualizarProducto');

        // ELIMINAR
        Route::post('/eliminar-producto/{id}', [EmprendedorController::class, 'eliminarProducto'])
            ->name('eliminarProducto');
        /*
        |--------------------------------------------------------------------------
        | PERFIL AJAX
        |--------------------------------------------------------------------------
        */

        Route::post('/actualizar-perfil',[EmprendedorController::class, 'actualizarPerfil'])
            ->name('actualizarPerfil');

        Route::post('/actualizar-redes',[EmprendedorController::class, 'actualizarRedes'])
            ->name('actualizarRedes');

        Route::post('/actualizar-password',[EmprendedorController::class, 'actualizarPassword'])
            ->name('actualizarPassword');
        Route::post('/actualizar-negocio', [EmprendedorController::class, 'actualizarNegocio'])
            ->name('actualizarNegocio');

    });

});