<?php

namespace App\Http\Controllers;

use App\Exceptions\EmpresaException;
use App\Http\Requests\Empresa\CadastroEmpresaRequest;
use App\Services\Empresa\EmpresaService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmpresaController extends Controller
{
    public function __construct(private EmpresaService $empresaService)
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
     *
     *  @OA\Post(
     *      path="/api/v1/empresa/cadastro",
     *      tags={"Empresa"},
     *      operationId="cadastroEmpresa",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema (
     *                  @OA\Property (
     *                      description="Nome da empresa",
     *                      property="empresa_nome",
     *                      type="string",
     *                      example="EMPRESA FICTICIA"
     *                  ),
     *                  @OA\Property (
     *                      description="CNPJ da empresa",
     *                      property="empresa_cnpj",
     *                      type="string",
     *                      example="55276465000161"
     *                  ),
     *                  @OA\Property (
     *                      description="Descrição da empresa",
     *                      property="empresa_descricao",
     *                      type="string",
     *                      example="Bar"
     *                  ),
     *                  @OA\Property (
     *                      description="Logo da empresa, caso haja",
     *                      property="file",
     *                      type="string",
     *                      format="file",
     *                  ),
     *                  required={"file"}
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Operacao com sucesso",
     *          @OA\Schema(ref="#/components/schemas/ApiResponse")
     *      )
     *  )
     *
     * @param CadastroEmpresaRequest $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function store(CadastroEmpresaRequest $request)
    {
        try {
            if(!isset($request['empresa_logo'])) {
                $empresa = $this->empresaService->cadastro($request->only(['empresa_nome', 'empresa_cnpj', 'empresa_descricao']));
                return response()->json([
                    'mensagem' => 'Empresa cadastrada com sucesso',
                    'empresa' => $empresa
                ], Response::HTTP_CREATED);
            }
            if($request->hasFile('empresa_logo') && $request->file('empresa_logo')->isValid()) {
                $nomeImagem = $this->empresaService->guardarImagem($request->file('empresa_logo'));
                $empresa = $request->only(['empresa_nome', 'empresa_cnpj', 'empresa_descricao', 'empresa_logo']);
                $empresa['empresa_logo'] = $nomeImagem;
                return response()->json([
                    'mensagem' => 'Empresa cadastrada com sucesso',
                    'empresa' => $this->empresaService->cadastro($empresa)
                ], Response::HTTP_CREATED);
            }
        } catch (EmpresaException $e) {
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
