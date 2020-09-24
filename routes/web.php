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

Route::get('/', [ProductController::class,'index'])->name('inicio');

Route::get('/Producto', [ProductController::class,'index'])->name('product');

Route::get('/Crear-Producto', [ProductController::class,'create'])->name('create');

Route::post('/Producto-Creado', [ProductController::class,'store'])->name('store');

Route::get('/Editar-Producto/{dato}', [ProductController::class,'edit'])->name('edit');

Route::patch('/Actualizado/{dato}', [ProductController::class,'update'])->name('update');

Route::delete('/Borrado/{dato}', [ProductController::class,'destroy'])->name('delete');
