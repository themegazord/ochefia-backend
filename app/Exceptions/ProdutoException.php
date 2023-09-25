<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ProdutoException extends Exception
{
    public static function produtoInexistente(): self {
        throw new self("O produto não existe.", Response::HTTP_NOT_FOUND);
    }
}
