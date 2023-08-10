<?php

namespace App\Http\Controllers;

use App\Exceptions\ClasseProdutoException;
use App\Http\Requests\Estoque\Classe\CadastroClasseProdutoRequest;
use App\Services\Estoque\Classe\ClasseProdutoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClasseProdutoController extends Controller
{
    public function __construct(
        private readonly ClasseProdutoService $classeProdutoService
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
    public function store(CadastroClasseProdutoRequest $request): JsonResponse
    {
        try {
            $novaClasseProduto = $this->classeProdutoService->cadastro($request->only([
                'classe_produto_nome'
            ]));
            return response()->json([
                'mensagem' => 'Classe de produtos cadastrado com sucesso',
                'classe_produto' => $novaClasseProduto
            ]);
        } catch (ClasseProdutoException $cpe) {
            return response()->json(['erro' => $cpe->getMessage()], $cpe->getCode());
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
