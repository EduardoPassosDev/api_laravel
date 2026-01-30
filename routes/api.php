<?php


use App\Http\Controllers\EntregaController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomendaController;
use App\Http\Controllers\UserController;


Route::get('/encomendas', [EncomendaController::class, 'buscarTodasEncomendas']);
Route::post('/encomendas', [EncomendaController::class, 'criarEncomenda']);
Route::get('/encomendas/{id}', [EncomendaController::class, 'buscarEntregaPorId']);
Route::patch('/encomendas/{id}', [EncomendaController::class, 'atualizarEncomenda']);
Route::delete('/encomendas/{id}', [EncomendaController::class, 'deletarEncomenda']);

Route::get('/users', [UserController::class, 'buscarTodosUsuarios']);
Route::post('/users', [UserController::class, 'criarUsuario']);
Route::get('/users/{id}', [UserController::class, 'buscarUsuarioPorId']);
Route::patch('/users/{id}', [UserController::class, 'atualizarUsuario']);
Route::delete('/users/{id}', [UserController::class, 'deletarUsuario']);

Route::get('/unidades', [UnidadeController::class, 'buscarTodasUnidade']);
Route::post('/unidades', [UnidadeController::class, 'criarUnidade']);
Route::get('/unidades/{id}', [UnidadeController::class, 'buscarUnidadePorId']);
Route::patch('/unidades/{id}', [UnidadeController::class, 'atualizarUnidade']);
Route::delete('/unidades/{id}', [UnidadeController::class, 'deletarUnidade']);

Route::get('/setores', [SetorController::class, 'buscarTodosSetores']);
Route::post('/setores', [SetorController::class, 'criarSetor']);
Route::get('/setores/{id}', [SetorController::class, 'buscarSetorPorId']);
Route::patch('/setores/{id}', [SetorController::class, 'atualizarSetor']);
Route::delete('/setores/{id}', [SetorController::class, 'deletarSetor']);

Route::get('/entregas', [EntregaController::class, 'buscarTodasEntregas']);
Route::post('/entregas', [EntregaController::class, 'criarEntrega']);
Route::get('/entregas/{id}', [EntregaController::class, 'buscarEntregaPorId']);
Route::patch('/entregas/{id}', [EntregaController::class, 'atualizarEntrega']);
Route::delete('/entregas/{id}', [EntregaController::class, 'deletarEntrega']);



