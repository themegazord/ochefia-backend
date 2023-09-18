<?php

namespace App\Services\Estoque\SubGrupo;

use App\Exceptions\SubGrupoProdutoException;
use App\Models\SubGrupoProduto;
use App\Repositories\Interfaces\Estoque\SubGrupo\ISubGrupoProduto;
use Illuminate\Database\Eloquent\Collection;

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

    public function listagem(): Collection {
        return $this->subGrupoProdutoRepository->listagem();
    }

    /**
     * @throws SubGrupoProdutoException
     */
    public function subGrupoPorId(int $id): SubGrupoProduto|SubGrupoProdutoException|null
    {
        $subgrupo = $this->consultaSubGrupoPorId($id);
        return is_null($subgrupo) ? SubGrupoProdutoException::subGrupoInexistente() : $subgrupo;
    }

    private function consultaSubGrupoPorNome(string $nomeSubGrupo): ?SubGrupoProduto {
        return $this->subGrupoProdutoRepository->subGrupoPorNome($nomeSubGrupo);
    }

    private function consultaSubGrupoPorId(int $id): ?SubGrupoProduto {
        return $this->subGrupoProdutoRepository->subGrupoPorId($id);
    }
}
