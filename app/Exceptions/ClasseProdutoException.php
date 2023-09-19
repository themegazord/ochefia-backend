<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ClasseProdutoException extends Exception
{
    /**
     * @throws ClasseProdutoException
     */
    public static function classeProdutoJaExiste(string $nomeClasseProduto): self
    {
        throw new self('A classe de produtos ' . strtoupper($nomeClasseProduto) . ' já existe, cadastre outra ou use-a.', Response::HTTP_CONFLICT);
    }

    /**
     * @throws ClasseProdutoException
     */
    public static function classeInexistente(): self {
        throw new self('A classe não existe', Response::HTTP_NOT_FOUND);
    }
}
