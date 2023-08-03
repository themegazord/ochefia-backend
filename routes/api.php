<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function() {
    Route::prefix('autenticacao')->group(function() {
        Route::post('login', [AutenticacaoController::class, 'login']);
    });
    Route::middleware('auth:sanctum')->group(function() {
        Route::prefix('empresa')->group(function() {
            Route::post('cadastro', [EmpresaController::class, 'store']);
        });
        Route::prefix('endereco')->group(function() {
            Route::post('cadastro', [EnderecoController::class, 'store']);
        });
        Route::prefix('funcionario')->group(function() {
            Route::post('cadastro', [FuncionarioController::class, 'store']);
        });
    });
});
