<?php

namespace App\Http\Controllers;

use App\Exceptions\PrazoPgtoException;
use App\Http\Requests\CadastroPrazoPgtoRequest;
use App\Services\PrazoPgto\PrazoPgtoService;
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
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroPrazoPgtoRequest $request): JsonResponse
    {
        try {
            $novoPrazoPgto = $this->prazoPgtoService->cadastro($request->only([
                'prazopgto_nome',
                'prazopgto_tipo',
                'prazopgto_tipoforma'
            ]));
            return response()->json([
                'mensagem' => 'O prazo de pagamento foi criado com sucesso',
                'prazopgto' => $novoPrazoPgto
            ], Response::HTTP_CREATED);
        } catch (PrazoPgtoException $ppe) {
            return response()->json(['error' => $ppe->getMessage()], $ppe->getCode());
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
