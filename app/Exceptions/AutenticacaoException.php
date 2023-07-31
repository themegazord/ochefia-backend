<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoException extends Exception
{
    public static function emailJaVinculadoAUmUsuario(): self {
        throw new self('O email inserido já pertence a um usuário, por favor, insira outra email válido ou conecte-se pela guia de login.', Response::HTTP_CONFLICT);
    }

    public static function senhaInvalida(): self {
        throw new self('A senha é inválida', Response::HTTP_CONFLICT);
    }

    public static function emailInexistente(): self {
        throw new self('O email inserido não está cadastrado, insira um válido ou se cadastre no sistema.', Response::HTTP_NOT_FOUND);
    }
}
