<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class EnderecoException extends Exception
{
    public static function CEPNaoExiste(string $cep): self {
        throw new self('O CEP ' . $cep . ' não existe', Response::HTTP_NOT_FOUND);
    }
}
