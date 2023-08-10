<?php

namespace App\Services\Estoque\SubGrupo;

use App\Exceptions\SubGrupoProdutoException;
use App\Models\SubGrupoProduto;
use App\Repositories\Interfaces\SubGrupoProduto\ISubGrupoProduto;

class SubGrupoProdutoService
{
    public function __construct(
        private readonly ISubGrupoProduto $subGrupoProdutoRepository
    )
    {
    }

    /**
     * @throws SubGrupoProdutoException
     */
    public function cadastro(array $subGrupo):SubGrupoProduto|SubGrupoProdutoException {
        if($this->consultaSubGrupoPorNome($subGrupo['sub_grupo_produto_nome'])) return SubGrupoProdutoException::subGrupoJaExistente($subGrupo['sub_grupo_produto_nome']);
        $subGrupo['sub_grupo_produto_nome'] = strtoupper($subGrupo['sub_grupo_produto_nome']);
        return $this->subGrupoProdutoRepository->cadastro($subGrupo);
    }

    private function consultaSubGrupoPorNome(string $nomeSubGrupo): ?SubGrupoProduto {
        return $this->subGrupoProdutoRepository->subGrupoPorNome($nomeSubGrupo);
    }
}
