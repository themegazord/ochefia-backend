<?php

namespace App\Http\Controllers;

use App\Exceptions\PrazoPgtoDiasException;
use App\Http\Requests\Financeiro\PrazoPgtoDias\CadastroPrazoPgtoDiasRequest;
use App\Services\Financeiro\PrazoPgtoDias\PrazoPgtoDiasService;
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
    public function store(CadastroPrazoPgtoDiasRequest $request)
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
