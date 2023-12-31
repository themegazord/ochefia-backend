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

    public function listagemFabricantes(): \Illuminate\Database\Eloquent\Collection {
        return $this->fabricanteProdutoRepository->listagemFabricantes();
    }

    /**
     * @throws FabricanteProdutoException
     */
    public function fabricantePorId(int $id): FabricanteProduto|FabricanteProdutoException {
        $fabricante = $this->fabricanteProdutoRepository->fabricantePorId($id);
        return is_null($fabricante) ? FabricanteProdutoException::fabricanteInexiste() : $fabricante;
    }

    /**
     * @throws FabricanteProdutoException
     */
    public function atualizaFabricantePorId(array $fabricante, int $id): int|FabricanteProdutoException
    {
        if (is_null($this->fabricanteProdutoRepository->fabricantePorId($id))) return FabricanteProdutoException::fabricanteInexiste();
        $fabricante['fabricante_produto_nome'] = strtoupper($fabricante['fabricante_produto_nome']);
        return $this->fabricanteProdutoRepository->atualizaFabricantePorId($fabricante, $id);
    }

    /**
     * @throws FabricanteProdutoException
     */
    public function removeFabricantePorId(int $id): mixed {
        if (is_null($this->fabricanteProdutoRepository->fabricantePorId($id))) return FabricanteProdutoException::fabricanteInexiste();
        return $this->fabricanteProdutoRepository->removeFabricantePorId($id);
    }

    private function consultaFabricanteProdutoPorNome(string $nomeFornecedorProduto): ?FabricanteProduto {
        return $this->fabricanteProdutoRepository->fabricanteProdutoPorNome($nomeFornecedorProduto);
    }
}
