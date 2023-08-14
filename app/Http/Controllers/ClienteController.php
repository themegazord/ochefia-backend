<?php

namespace App\Http\Controllers;

use App\Exceptions\ClienteException;
use App\Http\Requests\Cliente\CadastroClienteRequest;
use App\Services\Cliente\ClienteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends Controller
{
    public function __construct(
        private readonly ClienteService $clienteService
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
    public function store(CadastroClienteRequest $request): JsonResponse
    {
        try {
            $resposta = $this->clienteService->cadastro($request->only([
                'cliente_nome',
                'cliente_email',
                'cliente_senha',
                'cliente_cpf',
                'cliente_telefone',
                'cliente_telefone_contato'
            ]));
            return response()->json([
                'mensagem' => 'Cliente cadastrado com sucesso',
                'dados' => $resposta
            ], Response::HTTP_CREATED);
        } catch (ClienteException $ce) {
            return response()->json(['erro' => $ce->getMessage()], $ce->getCode());
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
