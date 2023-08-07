<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class GrupoProdutoException extends Exception
{
    public static function tipoGrupoProdutoNaoExistente(string $tipo): self {
        throw new self('O tipo de produto ' . $tipo . ' não existe no sistema, por favor, verificar na documentação', Response::HTTP_NOT_FOUND);
    }
}
