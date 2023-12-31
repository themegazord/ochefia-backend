<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class FormaPgtoException extends Exception
{
    public static function tipoFormaPgtoIncompativelComOsPadroes(string $tipo): self {
        throw new self('O tipo ' . $tipo . ' não faz parte dos tipos de forma de pagamento padrão.', Response::HTTP_BAD_REQUEST);
    }

    public static function formaPgtoInexistente(): self {
        throw new self('A forma de pagamento não existe', Response::HTTP_NOT_FOUND);
    }
}
