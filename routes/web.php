<?php

use Illuminate\Support\Facades\Route;

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
    return view('paginaInicial');
});
use App\Http\Controllers\pessoasController;
Route::get('pessoas/buscar',[pessoasController::class,'buscar']);
Route::resource('/pessoas', pessoasController::class);
use App\Http\Controllers\contatosController;
Route::get('contatos/buscar',[contatosController::class,'buscar']);
Route::resource('/contatos', contatosController::class);