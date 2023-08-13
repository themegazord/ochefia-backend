<?php

namespace App\Http\Controllers;

use App\Exceptions\FornecedorProdutoException;
use App\Http\Requests\Estoque\Fornecedor\CadastroFornecedorProdutoRequest;
use App\Services\Estoque\Fornecedor\FornecedorProdutoService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FornecedorProdutoController extends Controller
{
    public function __construct(
        private readonly FornecedorProdutoService $fornecedorProdutoService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroFornecedorProdutoRequest $request)
    {
        try {
            $novoFornecedorProduto = $this->fornecedorProdutoService->cadastro($request->only([
                'fornecedor_produto_nome'
            ]));
            return response()->json([
                'mensagem' => 'Fornecedor de produtos cadastrado com sucesso',
                'fornecedor_produto' => $novoFornecedorProduto
            ], Response::HTTP_CREATED);
        } catch (FornecedorProdutoException $fpe) {
            return response()->json(['erro' => $fpe->getMessage()], $fpe->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
