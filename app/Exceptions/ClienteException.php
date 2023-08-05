<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ClienteException extends Exception
{
    public static function CPFInvalido(string $cpf): self {
        throw new self('O CPF ' . $cpf . ' é inválido, por favor, verifique e tente novamente.', Response::HTTP_BAD_REQUEST);
    }
    public static function CPFJaExistente(string $cpf): self {
        throw new self('O CPF ' . $cpf . ' já está cadastro, por favor, verifique e tente novamente.', Response::HTTP_CONFLICT);
    }
}
