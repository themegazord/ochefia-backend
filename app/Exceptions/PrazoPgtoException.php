<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class PrazoPgtoException extends Exception
{
    /**
     * @throws PrazoPgtoException
     */
    public static function tipoIncompativelComOsPadroes(string $tipo): self {
        throw new self('O tipo ' . $tipo . ' não é compativel com os padrões do sistema, insira um válido.', Response::HTTP_CONFLICT);
    }

    public static function tipoFormaIncompativelComOsPadroes(string $tipoForma): self {
        throw new self('O tipo de forma de pagamento ' . $tipoForma . ' não é compativel com os padrões do sistema, insira um válido', Response::HTTP_CONFLICT);
    }
    public static function prazoPgtoInexistente(): self {
        throw new self('O prazo de pagamento não existe.', Response::HTTP_NOT_FOUND);
    }
}
