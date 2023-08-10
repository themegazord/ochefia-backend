<?php

namespace App\Http\Controllers;

use App\Exceptions\SubGrupoProdutoException;
use App\Http\Requests\Estoque\SubGrupo\CadastroSubGrupoProdutoRequest;
use App\Services\SubGrupoProduto\SubGrupoProdutoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubGrupoProdutoController extends Controller
{
    public function __construct(
        private readonly SubGrupoProdutoService $grupoProdutoService
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
    public function store(CadastroSubGrupoProdutoRequest $request): JsonResponse
    {
        try {
            $subGrupoNovo = $this->grupoProdutoService->cadastro($request->only('sub_grupo_produto_nome'));
            return response()->json([
                'mensagem' => 'Sub grupo de produto cadastrado com sucesso',
                'sub_grupo' => $subGrupoNovo
            ]);
        } catch (SubGrupoProdutoException $sgpe) {
            return response()->json(['erro' => $sgpe->getMessage()], $sgpe->getCode());
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
