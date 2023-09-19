<?php

namespace App\Http\Controllers;

use App\Exceptions\ClasseProdutoException;
use App\Http\Requests\Estoque\Classe\CadastroClasseProdutoRequest;
use App\Http\Requests\Estoque\Classe\EdicaoClasseProdutoRequest;
use App\Services\Estoque\Classe\ClasseProdutoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
    public function index(): JsonResponse
    {
        return response()->json(["classes" => $this->classeProdutoService->listagemClasseProduto()]);
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
            ], Response::HTTP_CREATED);
        } catch (ClasseProdutoException $cpe) {
            return response()->json(['erro' => $cpe->getMessage()], $cpe->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            return response()->json(['classe_produto' => $this->classeProdutoService->consultaClasseProdutoPorId($id)]);
        } catch (ClasseProdutoException $cpe) {
            return response()->json(['erro' => $cpe->getMessage()], $cpe->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoClasseProdutoRequest $request, string $id)
    {
        try {
            $classe = $request->only(['classe_produto_nome']);
            $this->classeProdutoService->atualizaClasseProdutoPorId($classe, $id);
            return response()->json([
                "mensagem" => "Classe atualizada com sucesso",
                "classe_produto" => ["classe_produto_nome" => strtoupper($classe['classe_produto_nome'])]
            ]);
        } catch (ClasseProdutoException $cpe) {
            return response()->json(["erro" => $cpe->getMessage()], $cpe->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
