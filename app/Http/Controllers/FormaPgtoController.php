<?php

namespace App\Http\Controllers;

use App\Exceptions\FormaPgtoException;
use App\Http\Requests\CadastroFormPgtoRequest;
use App\Services\Financeiro\FormaPgto\FormaPgtoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormaPgtoController extends Controller
{
    public function __construct(private readonly FormaPgtoService $formaPgtoService)
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
    public function store(CadastroFormPgtoRequest $request): JsonResponse
    {
        try {
            $novaFormaPgto = $this->formaPgtoService->cadastro($request->only([
                'formapgto_nome',
                'formapgto_tipo',
                'clientes_id',
                'prazopgto_id'
            ]));
            return response()->json([
                'mensagem' => 'Forma de pagamento cadastrada com sucesso',
                'formapgto' => $novaFormaPgto
            ], Response::HTTP_CREATED);
        } catch (FormaPgtoException $fpe) {
            return response()->json(['erro' => $fpe->getMessage()], $fpe->getCode());
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
