<?php

namespace App\Http\Controllers;

use App\Exceptions\PrazoPgtoException;
use App\Http\Requests\Financeiro\PrazoPgto\CadastroPrazoPgtoRequest;
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
