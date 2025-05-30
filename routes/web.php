<?php

use App\Http\Controllers\Admin\AdminShippingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\RoleController;
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
    //Rutas de Administrador y Super Administrador
    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function() {

        //Rutas de Super Administrador
        Route::middleware('admin:super-admin')->group(function() {
            Route::get('/role-permissions', [RoleController::class, 'index'])->name('role-permissions.index');
            Route::post('/role-permissions/update', [RoleController::class, 'update'])->name('role-permissions.update');
        });

        Route::middleware('admin:admin,super-admin')->group(function() {

            //Administrador de usuarios
            Route::resource('users', AdminUserController::class);
            Route::get('get-states', [AdminUserController::class, 'getStates'])->name('user.get-states');

            //Rutas de Envios
            Route::resource('shipping', AdminShippingController::class);
            Route::get('shipping/{shipping}/edit-status', [AdminShippingController::class, 'editStatus'])->name('shipping.editStatus');
            Route::post('shippings/{shipping}/upload-pdf', [AdminShippingController::class, 'uploadDocument'])->name('shippings.uploadPdf');
            Route::put('shippings/{shipping}/update-status', [AdminShippingController::class, 'updateStatus'])->name('shipping.updateStatus');
        });
    });

    //Rutas de Proveedores
    Route::group(['as' => 'provider.', 'prefix' => 'provider'], function() {
        
        Route::middleware('admin:provider,admin,super-admin')->group(function() {

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