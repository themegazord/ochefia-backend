<?php

namespace App\Http\Controllers;

use App\Exceptions\EnderecoException;
use App\Http\Requests\Endereco\CadastroEnderecoRequest;
use App\Services\Endereco\EnderecoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnderecoController extends Controller
{
    public function __construct(
        private EnderecoService $enderecoService
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
    public function store(CadastroEnderecoRequest $request): JsonResponse
    {
        try {
            $novoEndereco = $this->enderecoService->cadastro(
                $request->only(
                    'endereco_rua',
                    'endereco_numero',
                    'endereco_complemento',
                    'endereco_cep',
                    'endereco_bairro',
                    'endereco_cidade',
                )
            );
            return response()->json(
                [
                    'mensagem' => 'Endereço cadastrado com sucesso',
                    'endereco' => $novoEndereco
                ], Response::HTTP_CREATED
            );
        } catch (EnderecoException $e) {
            return response()->json(['erro' => $e->getMessage()], $e->getCode());
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
