<?php

namespace App\Http\Controllers;

use App\Exceptions\PrazoPgtoDiasException;
use App\Http\Requests\Financeiro\PrazoPgtoDias\CadastroPrazoPgtoDiasRequest;
use App\Http\Requests\Financeiro\PrazoPgtoDias\EdicaoPrazoPgtoDiasRequest;
use App\Services\Financeiro\PrazoPgtoDias\PrazoPgtoDiasService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrazoPgtoDiasController extends Controller
{
    public function __construct(
        private readonly PrazoPgtoDiasService $prazoPgtoDiasService
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
    public function store(CadastroPrazoPgtoDiasRequest $request): JsonResponse
    {

        $novoPrazoPgtoDias = $this->prazoPgtoDiasService->cadastro($request->only('parcelas'));
        return response()->json([
            'mensagem' => 'Dias para prazo de pagamento cadastrados com sucesso',
            'parcelas' => $novoPrazoPgtoDias
        ], Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $empresa, string $prazopgto_id): JsonResponse
    {
        return response()->json(["parcelas" => $this->prazoPgtoDiasService->consultaPrazoPgtoDiasPorEmpresa(json_decode(base64_decode($empresa)), $prazopgto_id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoPrazoPgtoDiasRequest $request, string $empresa, string $prazopgto_id): JsonResponse
    {
        return response()->json([
            "mensagem" => "Dias para prazo de pagamento alterados com sucesso",
            "parcelas" => $this->prazoPgtoDiasService->alteraPrazosPgtoDias(json_decode(base64_decode($empresa)), $request->only(["parcelas"]), $prazopgto_id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
