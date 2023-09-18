<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class SubGrupoProdutoException extends Exception
{
    /**
     * @throws SubGrupoProdutoException
     */
    public static function subGrupoJaExistente(string $subGrupoNome): self {
        throw new self('O sub grupo ' . strtoupper($subGrupoNome) . ' já existe, por favor, cadastre outro ou use o que já está cadastrado.', Response::HTTP_CONFLICT);
    }
    public static function subGrupoInexistente(): self {
        throw new self ('O sub grupo não existe', Response::HTTP_NOT_FOUND);
    }
}
