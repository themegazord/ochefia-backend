<?php

namespace App\Http\Controllers;

use App\Exceptions\FabricanteProdutoException;
use App\Http\Requests\Estoque\Fabricante\CadastroFabricanteProdutoRequest;
use App\Http\Requests\Estoque\Fabricante\EdicaoFabricanteProdutoRequest;
use App\Services\Estoque\Fabricante\FabricanteProdutoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FabricanteProdutoController extends Controller
{
    public function __construct(
        private readonly FabricanteProdutoService $fabricanteProdutoService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "fabricantes" => $this->fabricanteProdutoService->listagemFabricantes()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroFabricanteProdutoRequest $request): JsonResponse
    {
        try {
            $novoFabricante = $this->fabricanteProdutoService->cadastro($request->only([
                'fabricante_produto_nome'
            ]));
            return response()->json([
                'mensagem' => 'Fabricante de produtos cadastrado com sucesso',
                'fabricante_produto' => $novoFabricante
            ], Response::HTTP_CREATED);
        } catch (FabricanteProdutoException $fpe) {
            return response()->json(['erro' => $fpe->getMessage()], $fpe->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            return response()->json(["fabricante_produto" => $this->fabricanteProdutoService->fabricantePorId($id)]);
        } catch (FabricanteProdutoException $fpe) {
            return response()->json(["erro" => $fpe->getMessage()], $fpe->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoFabricanteProdutoRequest $request, string $id)
    {
        try {
            $this->fabricanteProdutoService->atualizaFabricantePorId($request->only(['fabricante_produto_nome']), $id);
            return response()->json(["mensagem" => "Fabricante atualizado com sucesso"]);
        } catch (FabricanteProdutoException $fpe) {
            return response()->json(["erro" => $fpe->getMessage()], $fpe->getCode());
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
