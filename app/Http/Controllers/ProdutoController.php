<?php

namespace App\Http\Controllers;

use App\Exceptions\ProdutoException;
use App\Http\Requests\Estoque\Produto\CadastroProdutoRequest;
use App\Http\Requests\Estoque\Produto\EdicaoProdutoRequest;
use App\Services\Estoque\Produto\ProdutoService;
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
    public function index(string $empresa): JsonResponse
    {
        return response()->json(["produtos" => $this->produtoService->listagemProdutosPorEmpresa(json_decode(base64_decode($empresa)))]);
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
                'fabricante_produto_id',
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
            return response()->json(['erro' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $empresa_token, string $id)
    {
        try {
            return response()->json(["produto" => $this->produtoService->consultaProduto(json_decode(base64_decode($empresa_token)), $id)]);
        } catch (ProdutoException $pe) {
            return response()->json(["erro" => $pe->getMessage()], $pe->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoProdutoRequest $request, string $empresa_token, string $id)
    {
        try {
            $this->produtoService->edicaoProduto($request->only([
                'empresa_id',
                'grupo_produto_id',
                'sub_grupo_produto_id',
                'fabricante_produto_id',
                'classe_produto_id',
                'unidade_id',
                'produto_nome',
                'produto_estoque',
                'produto_preco'
            ]), json_decode(base64_decode($empresa_token)), $id);
            return response()->json(["mensagem" => "Produto atualizado com sucesso."]);
        } catch (ProdutoException $pe) {
            return response()->json(["erro" => $pe->getMessage()], $pe->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
