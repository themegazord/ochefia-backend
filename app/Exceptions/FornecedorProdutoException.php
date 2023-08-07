<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class FornecedorProdutoException extends Exception
{
    /**
     * @throws FornecedorProdutoException
     */
    public static function fornecedorProdutoJaExiste(string $nomeFornecedorProduto): self {
        throw new self('O fornecedor ' . strtoupper($nomeFornecedorProduto) . ' já existe no banco de dados, por favor, cadastro outro ou use-o', Response::HTTP_CONFLICT);
    }
}
