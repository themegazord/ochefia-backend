<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class EmpresaException extends Exception
{
    public static function CNPJInvalido(string $cnpj): self {
        throw new self('O CNPJ ' . $cnpj . ' é inválido, por favor, verificar.', Response::HTTP_BAD_REQUEST);
    }

    public static function CNPJExistente(string $cnpj): self {
        throw new self('O CNPJ ' . $cnpj . ' já existe no sistema, por favor, conecte-se com seu usuário vinculado a ele', Response::HTTP_CONFLICT);
    }
}
