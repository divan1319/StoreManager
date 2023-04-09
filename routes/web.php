<?php

use App\Http\Controllers\ComprasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\RecargasController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class,'index'])->name('login');
Route::post('/', [LoginController::class,'store'])->name('login.store');
Route::post('/logout', [LoginController::class,'LogOut'])->name('login.logout');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
Route::get('/recargas', [RecargasController::class,'index'])->name('recargas.index');
Route::post('/recargas', [RecargasController::class,'store'])->name('recargas.store');

Route::get('/compras',[ComprasController::class,'index'])->name('compras.index');
Route::get('/compras/externas',[ComprasController::class,'externas'])->name('compras.externas');
Route::get('/compras/pedidos',[ComprasController::class,'pedidos'])->name('compras.pedidos');

Route::get('/pedidos',[PedidosController::class,'show'])->name('pedidos.show');
Route::post('/pedidos',[PedidosController::class,'store'])->name('pedidos.store');
Route::get('/pedidos/{pedido}/{ID}',[PedidosController::class,'details'])->name('pedidos.details');


