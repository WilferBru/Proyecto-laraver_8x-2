<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('product');
// });

Route::get('/', [ProductController::class,'welcome'])->name('inicio')->middleware('guest');

Route::get('/Producto', [ProductController::class,'index'])->name('product')->middleware('auth');

Route::get('/Crear-Producto', [ProductController::class,'create'])->name('create')->middleware('auth');

Route::post('/Producto-Creado', [ProductController::class,'store'])->name('store')->middleware('auth');

Route::get('/Editar-Producto/{dato}', [ProductController::class,'edit'])->name('edit')->middleware('auth');

Route::patch('/Actualizado/{dato}', [ProductController::class,'update'])->name('update')->middleware('auth');

Route::delete('/Borrado/{dato}', [ProductController::class,'destroy'])->name('delete')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
