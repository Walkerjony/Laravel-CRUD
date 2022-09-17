<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtoController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/cadastra', [produtoController::class, 'cadastra'])->middleware('auth')->name('cadastraProduto');
Route::post('/insere', [produtoController::class, 'insere'])->name('insereProduto');

Route::get('/listar', [produtoController::class, 'listar'])->name('listarProduto');

Route::get('/edita/{id}', [produtoController::class, 'edita'])->name('editaProduto');
Route::post('/atualiza/{id}', [produtoController::class, 'atualiza'])->name('atualizaProduto');

Route::get('/apaga/{ID}', [produtoController::class, 'apaga'])->middleware('auth')->name('apagaProduto');
