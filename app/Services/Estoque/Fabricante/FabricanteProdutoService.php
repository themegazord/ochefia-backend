<?php

namespace App\Services\Estoque\Fabricante;

use App\Exceptions\FabricanteProdutoException;
use App\Models\FabricanteProduto;
use App\Repositories\Interfaces\Estoque\Fabricante\IFabricanteProduto;

class FabricanteProdutoService
{
    public function __construct(
        private readonly IFabricanteProduto $fabricanteProdutoRepository
    )
    {
    }

    /**
     * @throws FabricanteProdutoException
     */
    public function cadastro(array $fabricante): FabricanteProduto|FabricanteProdutoException {
        if ($this->consultaFabricanteProdutoPorNome($fabricante['fabricante_produto_nome'])) return FabricanteProdutoException::fabricanteProdutoJaExiste($fabricante['fabricante_produto_nome']);
        $fabricante['fabricante_produto_nome'] = strtoupper($fabricante['fabricante_produto_nome']);
        return $this->fabricanteProdutoRepository->cadastro($fabricante);
    }

    private function consultaFabricanteProdutoPorNome(string $nomeFornecedorProduto): ?FabricanteProduto {
        return $this->fabricanteProdutoRepository->fabricanteProdutoPorNome($nomeFornecedorProduto);
    }
}
