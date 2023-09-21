<?php

namespace App\Http\Controllers;

use App\Exceptions\UnidadeException;
use App\Http\Requests\Estoque\Unidade\CadastroUnidadeRequest;
use App\Http\Requests\Estoque\Unidade\EdicaoUnidadeRequest;
use App\Services\Estoque\Unidade\UnidadeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnidadeController extends Controller
{
    public function __construct(
        private readonly UnidadeService $unidadeService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(["unidades" => $this->unidadeService->listagemUnidade()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroUnidadeRequest $request): JsonResponse
    {
        try {
            $novaUnidade = $this->unidadeService->cadastro($request->only([
                'unidade_nome'
            ]));
            return response()->json([
                'mensagem' => 'Unidade de medida cadastrada com sucesso',
                'unidade' => $novaUnidade
            ], Response::HTTP_CREATED);
        } catch (UnidadeException $ue) {
            return response()->json(['erro' => $ue->getMessage()], $ue->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            return response()->json(["unidade" => $this->unidadeService->unidadePorId($id)]);
        } catch (UnidadeException $ue) {
            return response()->json(["erro" => $ue->getMessage()], $ue->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoUnidadeRequest $request, string $id): JsonResponse
    {
        try {
            $this->unidadeService->editaUnidadePorId($request->only('unidade_nome'), $id);
            return response()->json(["mensagem" => "Unidade de medida atualizada com sucesso"]);
        } catch (UnidadeException $ue) {
            return response()->json(["erro" => $ue->getMessage()], $ue->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->unidadeService->removeUnidadePorId($id);
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (UnidadeException $ue) {
            return response()->json(["erro" => $ue->getMessage()], $ue->getCode());
        }
    }
}
