<?php

namespace App\Http\Controllers;

use App\Exceptions\PrazoPgtoException;
use App\Http\Requests\Financeiro\PrazoPgto\CadastroPrazoPgtoRequest;
use App\Http\Requests\Financeiro\PrazoPgto\EdicaoPrazoPgtoRequest;
use App\Services\Financeiro\PrazoPgto\PrazoPgtoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrazoPgtoController extends Controller
{
    public function __construct(
        private readonly PrazoPgtoService $prazoPgtoService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $empresa_token)
    {
        return response()->json(["prazospgto" => $this->prazoPgtoService->listagemPrazoPgto(json_decode(base64_decode($empresa_token)))]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroPrazoPgtoRequest $request): JsonResponse
    {
        try {
            $novoPrazoPgto = $this->prazoPgtoService->cadastro($request->only([
                'empresa_id',
                'prazopgto_nome',
                'prazopgto_tipo',
                'prazopgto_tipoforma'
            ]));
            return response()->json([
                'mensagem' => 'O prazo de pagamento foi criado com sucesso',
                'prazopgto' => $novoPrazoPgto
            ], Response::HTTP_CREATED);
        } catch (PrazoPgtoException $ppe) {
            return response()->json(['erro' => $ppe->getMessage()], $ppe->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $empresa, string $id): JsonResponse
    {
        try {
            return response()->json(["prazopgto" => $this->prazoPgtoService->consultaPrazoPgtoPorEmpresa(json_decode(base64_decode($empresa)), $id)]);
        } catch (PrazoPgtoException $ppe) {
            return response()->json(["erro" => $ppe->getMessage()], $ppe->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoPrazoPgtoRequest $request, string $empresa, string $id): JsonResponse
    {
        try {
            $this->prazoPgtoService->editaPrazoPgtoPorEmpresa($request->only([
                'empresa_id',
                'prazopgto_nome',
                'prazopgto_tipo',
                'prazopgto_tipoforma'
            ]), json_decode(base64_decode($empresa)), $id);
            return response()->json(["mensagem" => "Prazo de pagamento atualizado com sucesso"]);
        } catch (PrazoPgtoException $ppe) {
            return response()->json(["erro" => $ppe->getMessage()], $ppe->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $empresa, string $id): JsonResponse
    {
        try {
            $this->prazoPgtoService->removePrazoPgtoPorEmpresa(json_decode(base64_decode($empresa)), $id);
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (PrazoPgtoException $ppe) {
            return response()->json(["erro" => $ppe->getMessage()], $ppe->getCode());
        }
    }
}
