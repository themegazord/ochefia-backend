<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class FabricanteProdutoException extends Exception
{
    /**
     * @throws FabricanteProdutoException
     */
    public static function fabricanteProdutoJaExiste(string $nomeFornecedorProduto): self {
        throw new self('O fabricante ' . strtoupper($nomeFornecedorProduto) . ' já existe no banco de dados, por favor, cadastro outro ou use-o', Response::HTTP_CONFLICT);
    }
}
