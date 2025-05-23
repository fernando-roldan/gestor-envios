<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Provider\ProviderQuoteController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false, 'verify' => false]); //Quitar las rutas de registro y verificacion

Route::get('/', function() {

    if(Auth::check()) { //Verificar si el usuario esta logueado

        return redirect()->route('dashboard_default');
    }

    return redirect()->route('login'); //Retorna a la ruta /login si el usuario no se a logueado
});

//Rutas autenticadas para administrador y proveedores
Route::middleware(['auth'])->group(function() {

    //Ingreso al Dashboard administradores y proveedores
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard_default');
    //Rutas de Administrador
    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function() {

        Route::middleware(AdminMiddleware::class, ':admin')->group(function() {

            //Administrador de usuarios
            Route::get('users', [AdminUserController::class, 'index'])->name('users');
        });
    });

    //Rutas de Proveedores
    Route::group(['as' => 'provider.', 'prefix' => 'provider'], function() {
        
        Route::middleware(AdminMiddleware::class, ':provider')->group(function() {

            //Ruta de Cotizaciones
            Route::get('cotizaciones', [ProviderQuoteController::class, 'index'])->name('quote.index');
        });
    });
});

/* Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */