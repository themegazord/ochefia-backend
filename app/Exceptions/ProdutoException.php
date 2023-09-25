<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ProdutoException extends Exception
{
    public static function produtoInexistente(): self {
        throw new self("O produto não existe.", Response::HTTP_NOT_FOUND);
    }
    public static function produtoNaoExisteNaEmpresa(): self {
        throw new self("O produto informado não existe na empresa passada como parametro, entre em contato com o suporte.", Response::HTTP_BAD_REQUEST);
    }
}
