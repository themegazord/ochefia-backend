<?php

namespace App\Http\Controllers;

use App\Exceptions\UnidadeException;
use App\Http\Requests\Produto\Unidade\CadastroUnidadeRequest;
use App\Services\Unidade\UnidadeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
    public function index()
    {
        //
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
            ]);
        } catch (UnidadeException $ue) {
            return response()->json(['erro' => $ue->getMessage()], $ue->getCode());
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
