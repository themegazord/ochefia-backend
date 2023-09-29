<?php

namespace App\Http\Controllers;

use App\Exceptions\AutenticacaoException;
use App\Http\Requests\Autenticacao\LoginRequest;
use App\Services\Autenticacao\CadastroService;
use App\Services\Autenticacao\LoginService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class AutenticacaoController extends Controller
{
    public function __construct(
        private CadastroService $cadastroService,
        private LoginService $loginService
        )
    {

    }
    /**
     *  @OA\Post(
     *      path="/api/v1/autenticacao/login",
     *      tags={"Login de funcionários e clientes"},
     *      operationId="Login",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property (
     *                  property="email",
     *                  type="string",
     *                  example="joe_doe@email.com"
     *              ),
     *              @OA\Property (
     *                  property="password",
     *                  type="string",
     *                  format="password",
     *                  example="1234"
     *              )
     *          )
     *      ),
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="token", type="string", example="5|FggYlCsXzqKISnrGA6NHZzJtQaRD2YGMZQ1yDPvf"),
     *              @OA\Property(property="user", type="object",
     *                  @OA\Property(property="id", type="integer", format="int64", example="10"),
     *                  @OA\Property (property="name", type="string", example="Joe"),
     *                  @OA\Property (property="email", type="string", example="joe_doe@email.com"),
     *              ),
     *              @OA\Property (property="empresa_token", type="string", example="eyJlbXByZXNhX2lkIjo1LCJlbXByZXNhX2NucGoiOiI0NjUxOTQyMzAwMDExMyJ9"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="409",
     *          description="Ao tentar entrar no sistema com uma senha que não é a cadastrada com o email enviado.",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property (property="erro", example="A senha é inválida.")
     *          ),
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Ao tentar entrar no sistema com um email que não existe",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property (property="erro", example="O email inserido não está cadastrado, insira um válido ou se cadastre no sistema.")
     *          ),
     *      ),
     *  )
     */
    public function login(LoginRequest $request): JsonResponse {
        try {
            return response()->json(['mensagem' => $this->loginService->login($request->only(['email', 'password']))]);
        } catch (AutenticacaoException $e) {
            return response()->json(['erro' => $e->getMessage()], $e->getCode());
        }
    }
}
