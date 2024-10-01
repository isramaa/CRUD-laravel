<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoControllers;
use App\Http\Controllers\ClienteControllers;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Models\Cliente;



Route::get('/', function () {
    return view('welcome');
});

/* Route::resource('productos', ProductoController::class);
 */
Auth::routes();

//----Index-----//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');

//----Creates----//
Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::get('/pedido/create', [PedidoController::class, 'create'])->name('pedido.create');

//----Shows----// //----URL principal parar ver el view ----//
Route::resource('productos', App\Http\Controllers\ProductoController::class)
    ->except(['show'])
    ->middleware('auth');//controles en singular
Route::resource('clientes', App\Http\Controllers\ClienteController::class)
    ->except(['show'])
    ->middleware('auth');
    Route::resource('pedidos', App\Http\Controllers\PedidoController::class)
    ->except(['show'])
    ->middleware('auth');
//----Deletes----//
Route::get('/delete-productos/{id}', array( /* {ucto_id?}  el ? es para que no sea constante lo introducido  */
    'as' => 'productoDelete',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\ProductoController@deleteProducto'
 ));
 Route::get('/delete-cliente/{id}', array(
    'as' => 'clienteDelete',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\ClienteController@deleteCliente'
));
Route::get('/delete-pedido/{id}', array(
    'as' => 'pedidoDelete',
    'middleware' => 'auth',
    'uses' => '\App\Http\Controllers\PedidoController@deletePedido'
));

Auth::routes();

//----Imprimir----//
Route::get('/imprimirPro', [App\Http\Controllers\ProductoController::class, 'imprimirPro'])->name('imprimirPro');
Route::get('/imprimirCli', [App\Http\Controllers\ClienteController::class, 'imprimirCli'])->name('imprimirCli');
Route::get('/imprimirPed', [App\Http\Controllers\PedidoController::class, 'imprimirPed'])->name('imprimirPed');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
