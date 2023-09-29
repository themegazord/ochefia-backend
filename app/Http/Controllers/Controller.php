<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 *
 *  @OA\Info(
 *      version="2.0.0",
 *      title="O Chefia",
 *      description="Backend para um sistema de PDV e controle simples empresarial.",
 *      @OA\Contact(
 *          email="contato.wanjalagus@outlook.com.br"
 *      ),
 *      @OA\License(
 *          name="MIT License",
 *          url="https://opensource.org/license/mit/"
 *      )
 *  ),
 *  @OA\Server(
 *      description="O Chefia servidor",
 *      url="http://127.0.0.1:8000/"
 *  )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
