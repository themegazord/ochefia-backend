<?php

namespace App\Http\Controllers;

use App\Exceptions\FuncionarioException;
use App\Http\Requests\Funcionario\CadastroFuncionarioRequest;
use App\Services\Funcionario\FuncionarioService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FuncionarioController extends Controller
{
    public function __construct(private readonly FuncionarioService $funcionarioService) {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function store(CadastroFuncionarioRequest $request): JsonResponse {
        $eDono = $request->getRequestUri() == '/api/v1/funcionario/cadastro/dono';
        try {
            $funcionarioNovo = $this->funcionarioService->cadastro($request->only([
                'empresa_id',
                'endereco_id',
                'funcionario_nome',
                'funcionario_email',
                'funcionario_senha',
                'cargo',
                'acessos'
            ]), $eDono);
            return response()->json(
                [
                    'mensagem' => 'Funcionário cadastrado com sucesso',
                    'dados' => $funcionarioNovo
                ],
                Response::HTTP_CREATED
            );
        } catch (FuncionarioException $e) {
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
