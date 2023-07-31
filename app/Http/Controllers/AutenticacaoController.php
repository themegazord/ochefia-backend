<?php

namespace App\Http\Controllers;

use App\Exceptions\AutenticacaoException;
use App\Http\Requests\LoginRequest;
use App\Services\Autenticacao\CadastroService;
use App\Services\Autenticacao\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoController extends Controller
{
    public function __construct(
        private CadastroService $cadastroService,
        private LoginService $loginService
        )
    {

    }
    public function login(LoginRequest $request): JsonResponse {
        try {
            return response()->json(['mensagem' => $this->loginService->login($request->only(['email', 'password']))], Response::HTTP_CREATED);
        } catch (AutenticacaoException $e) {
            return response()->json(['erro' => $e->getMessage()], $e->getCode());
        }
    }
}
