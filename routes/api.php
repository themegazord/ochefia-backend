<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\ClasseProdutoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\FormaPgtoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GrupoProdutoController;
use App\Http\Controllers\PrazoPgtoController;
use App\Http\Controllers\PrazoPgtoDiasController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SubGrupoProdutoController;
use App\Http\Controllers\FornecedorProdutoController;
use App\Http\Controllers\UnidadeController;
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
        Route::post('login', [AutenticacaoController::class, 'login'])->name('autenticacao.login');
    });
    Route::prefix('funcionario')->group(function() {
        Route::post('cadastro/dono', [FuncionarioController::class, 'store'])->name('funcionarioDono.store');
    });
    Route::prefix('cliente')->group(function() {
        Route::post('cadastro', [ClienteController::class, 'store'])->name('cliente.store');
    });
    Route::prefix('empresa')->group(function() {
        Route::post('cadastro', [EmpresaController::class, 'store'])->name('empresa.store');
    });
    Route::middleware('auth:sanctum')->group(function() {
        Route::prefix('endereco')->group(function() {
            Route::post('cadastro', [EnderecoController::class, 'store'])->name('endereco.store');
        });
        Route::prefix('funcionario')->group(function() {
            Route::post('cadastro/funcionario', [FuncionarioController::class, 'store'])->name('funcionario.store');
        });
        Route::prefix('grupo_produto')->group(function() {
            Route::post('cadastro', [GrupoProdutoController::class, 'store'])->name('grupo_produto.store');
            Route::get('listagem', [GrupoProdutoController::class, 'index'])->name('grupo_produto.index');
            Route::get('grupo/{id}', [GrupoProdutoController::class, 'show'])->name('grupo_produto.show');
            Route::put('grupo/{id}', [GrupoProdutoController::class, 'update'])->name('grupo_produto.update');
            Route::delete('grupo/{id}', [GrupoProdutoController::class, 'destroy'])->name('grupo_produto.destroy');
        });
        Route::prefix('sub_grupo_produto')->group(function() {
            Route::post('cadastro', [SubGrupoProdutoController::class, 'store'])->name('sub_grupo_produto.store');
            Route::get('listagem', [SubGrupoProdutoController::class, 'index'])->name('sub_grupo_produto.index');
            Route::get('sub_grupo/{id}', [SubGrupoProdutoController::class, 'show'])->name('sub_grupo_produto.show');
            Route::put('sub_grupo/{id}', [SubGrupoProdutoController::class, 'update'])->name('sub_grupo_produto.update');
        });
        Route::prefix('fornecedor_produto')->group(function() {
            Route::post('cadastro', [FornecedorProdutoController::class, 'store'])->name('fornecedor_produto.store');
        });
        Route::prefix('unidade')->group(function() {
           Route::post('cadastro', [UnidadeController::class, 'store'])->name('unidade.store');
        });
        Route::prefix('classe_produto')->group(function() {
           Route::post('cadastro', [ClasseProdutoController::class, 'store'])->name('classe_produto.store');
        });
        Route::prefix('produto')->group(function() {
           Route::post('cadastro', [ProdutoController::class, 'store'])->name('produto.store');
        });
        Route::prefix('prazopgto')->group(function() {
           Route::post('cadastro', [PrazoPgtoController::class, 'store'])->name('prazopgto.store');
        });
        Route::prefix('prazopgtodias')->group(function() {
           Route::post('cadastro', [PrazoPgtoDiasController::class, 'store'])->name('prazopgtodias.store');
        });
        Route::prefix('formapgto')->group(function() {
           Route::post('cadastro', [FormaPgtoController::class, 'store'])->name('formapgto.store');
        });
    });
});
