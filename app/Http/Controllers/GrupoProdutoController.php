<?php

namespace App\Http\Controllers;

use App\Exceptions\GrupoProdutoException;
use App\Http\Requests\Produto\Grupo\CadastroGrupoProdutoRequest;
use App\Services\GrupoProduto\GrupoProdutoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GrupoProdutoController extends Controller
{
    public function __construct(
        private readonly GrupoProdutoService $grupoProdutoService
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
    public function store(CadastroGrupoProdutoRequest $request): JsonResponse
    {
        try {
            $grupoProdutoNovo = $this->grupoProdutoService->cadastro($request->only([
                'grupo_produto_nome',
                'grupo_produto_tipo'
            ]));
            return response()->json([
                'mensagem' => 'Grupo de produto cadastrado com sucesso',
                'grupo' => $grupoProdutoNovo
            ]);
        } catch (GrupoProdutoException $gpe) {
            return response()->json(['erro' => $gpe->getMessage()], $gpe->getCode());
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
