<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class FuncionarioException extends Exception
{
    public static function emailDeFuncionarioJaExistenteParaEssaEmpresa(string $email): self {
        throw new self('O email ' . $email . ' já está cadastrado em sua empresa, por favor, verifique.', Response::HTTP_CONFLICT);
    }
}
