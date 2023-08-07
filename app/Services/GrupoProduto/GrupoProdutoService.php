<?php

namespace App\Services\GrupoProduto;

use App\Enums\Produtos\Grupo\TiposGruposEnum;
use App\Exceptions\GrupoProdutoException;
use App\Models\GrupoProduto;
use App\Repositories\Interfaces\GrupoProduto\IGrupoProduto;

class GrupoProdutoService
{
    public function __construct(private readonly IGrupoProduto $grupoRepository)
    {

    }

    /**
     * @throws GrupoProdutoException
     */
    public function cadastro(array $grupoProduto): GrupoProduto
    {
        $grupoProduto['grupo_produto_tipo'] = $this->defineTipoGrupoProduto($grupoProduto['grupo_produto_tipo']);
        return $this->grupoRepository->cadastro($grupoProduto);
    }

    /**
     * @throws GrupoProdutoException
     */
    private function defineTipoGrupoProduto(string $tipo): TiposGruposEnum|GrupoProdutoException {
        return match ($tipo) {
            'PRODUTO_FINAL' => TiposGruposEnum::PRODUTO_FINAL,
            'MATERIA_PRIMA' => TiposGruposEnum::MATERIA_PRIMA,
            'EMBALAGEM' => TiposGruposEnum::EMBALAGEM,
            'SERVICOS' => TiposGruposEnum::SERVICOS,
            'OUTROS' => TiposGruposEnum::OUTROS,
            default => GrupoProdutoException::tipoGrupoProdutoNaoExistente($tipo)
        };
    }
}
