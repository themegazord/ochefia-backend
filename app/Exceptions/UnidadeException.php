<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UnidadeException extends Exception
{
    public static function unidadeDeMedidaJaExiste(string $unidade_nome): self {
        throw new self('A unidade de medida ' . strtoupper($unidade_nome) . ' já existe, cadastre uma nova ou use-a', Response::HTTP_CONFLICT);
    }

    public static function unidadeInexistente(): self {
        throw new self('A unidade de medida é inexistente.', Response::HTTP_NOT_FOUND);
    }
}
