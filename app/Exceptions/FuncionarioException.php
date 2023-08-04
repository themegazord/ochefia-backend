<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class FuncionarioException extends Exception
{
    /**
     * @throws FuncionarioException
     */
    public static function emailDeFuncionarioJaExistenteParaEssaEmpresa(string $email): self {
        throw new self('O email ' . $email . ' já está cadastrado em sua empresa, por favor, verifique.', Response::HTTP_CONFLICT);
    }

    public static function quantidadeDeDonosAtingidaPorEmpresa(): self {
        throw new self('A quantidade de donos configurada por empresa foi excedida, por favor, configurar uma quantidade maior e tentar novamente.', Response::HTTP_CONFLICT);
    }
    public static function rotaExclusivaParaCadastroDeDonos(): self {
        throw new self('Você está tentando cadastrar um funcionário com cargo diferente de DONO na rota de cadastro de donos, por favor, verifique e tente novamente', Response::HTTP_CONFLICT);
    }
}
