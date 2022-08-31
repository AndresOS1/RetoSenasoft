<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PedidoController;
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
Route::get('/d',function(){
    return view('layouts.dashboard');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/proveedor.index', [ProveedorController::class,'index'])->name('proveedor.index');
Route::get('/proveedor.create', [ProveedorController::class,'create'])->name('proveedor.create');
Route::post('/proveedor.store', [ProveedorController::class,'store'])->name('proveedor.store');
Route::get('/proveedoredit/{id}', [ProveedorController::class,'edit'])->name('proveedoredit');
Route::post('/proveedorupdate/{id}', [ProveedorController::class,'update'])->name('proveedorupdate');
Route::DELETE('/proveedordestroy/{id}', [ProveedorController::class,'destroy'])->name('proveedordestroy');


Route::get('/pedido.index', [PedidoController::class,'index'])->name('pedido.index');
Route::post('/pedido.store', [PedidoController::class,'store'])->name('pedido.store');
Route::get('/pedidoedit/{id}', [PedidoController::class,'edit'])->name('pedidoedit');
Route::post('/pedidoupdate/{id}', [PedidoController::class,'update'])->name('pedidoupdate');
Route::DELETE('/pedidodestroy/{id}', [PedidoController::class,'destroy'])->name('pedidodestroy');


// Route::get('/proveedor.index', [ProveedorController::class,'index'])->name('proveedor.index');
// Route::post('/proveedor.store', [ProveedorController::class,'store'])->name('proveedor.store');
// Route::get('/proveedoredit/{id}', [ProveedorController::class,'edit'])->name('proveedoredit');
// Route::post('/proveedorupdate/{id}', [ProveedorController::class,'update'])->name('proveedorupdate');
// Route::DELETE('/proveedordestroy/{id}', [ProveedorController::class,'destroy'])->name('proveedordestroy');






