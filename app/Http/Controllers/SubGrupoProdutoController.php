<?php

namespace App\Http\Controllers;

use App\Exceptions\SubGrupoProdutoException;
use App\Http\Requests\Estoque\SubGrupo\CadastroSubGrupoProdutoRequest;
use App\Http\Requests\Estoque\SubGrupo\EdicaoSubGrupoProdutoRequest;
use App\Services\Estoque\SubGrupo\SubGrupoProdutoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        try {
            return response()->json(["subgrupos" => $this->grupoProdutoService->listagem()]);
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()], $e->getCode());
        }
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
            ], Response::HTTP_CREATED);
        } catch (SubGrupoProdutoException $sgpe) {
            return response()->json(['erro' => $sgpe->getMessage()], $sgpe->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            return response()->json(["sub_grupo" => $this->grupoProdutoService->subGrupoPorId($id)->only([
                "sub_grupo_produto_id",
                "sub_grupo_produto_nome",
            ])]);
        } catch (SubGrupoProdutoException $sgpe) {
            return response()->json(["erro" => $sgpe->getMessage()], $sgpe->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoSubGrupoProdutoRequest $request, string $id): JsonResponse
    {
        try {
            $this->grupoProdutoService->atualizaSubGrupoPorId($request->only('sub_grupo_produto_nome'), $id);
            return response()->json(["mensagem" => "Sub grupo atualizado com sucesso"]);
        } catch (SubGrupoProdutoException $sgpe) {
            return response()->json(["erro" => $sgpe->getMessage()], $sgpe->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->grupoProdutoService->remocaoSubGrupoPorId($id);
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (SubGrupoProdutoException $sgpe) {
            return response()->json(["erro" => $sgpe->getMessage()], $sgpe->getCode());
        }
    }
}
