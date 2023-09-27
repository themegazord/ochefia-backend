<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class PrazoPgtoDiasException extends Exception
{
    public static function prazoPgtoDiasInexistente(): self {
        throw new self('Os dias para prazo de pagamento não existem.', Response::HTTP_NOT_FOUND);
    }
}
