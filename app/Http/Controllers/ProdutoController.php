<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroProdutoRequest;
use App\Services\Produto\ProdutoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdutoController extends Controller
{
    public function __construct(
        private readonly ProdutoService $produtoService
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
    public function store(CadastroProdutoRequest $request): JsonResponse
    {
        try {
            $produtoNovo = $this->produtoService->cadastro($request->only([
                'empresa_id',
                'grupo_produto_id',
                'sub_grupo_produto_id',
                'fornecedor_produto_id',
                'classe_produto_id',
                'unidade_id',
                'produto_nome',
                'produto_estoque',
                'produto_preco'
            ]));
            return response()->json([
                'mensagem' => 'Produto cadastrado com sucesso',
                'produto' => $produtoNovo
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['erro' => $e->getMessage()], $e->getCode());
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
