<?php

namespace App\Services\Estoque\Grupo;

use App\Enums\Produtos\Grupo\TiposGruposEnum;
use App\Enums\Produtos\Grupo\TiposRetornoGruposEnum;
use App\Exceptions\GrupoProdutoException;
use App\Models\GrupoProduto;
use App\Repositories\Interfaces\Estoque\Grupo\IGrupoProduto;
use Illuminate\Database\Eloquent\Collection;

class GrupoProdutoService
{
    public function __construct(private readonly IGrupoProduto $grupoRepository)
    {

    }

    /**
     * @throws GrupoProdutoException
     */
    public function cadastro(array $grupoProduto): GrupoProdutoException|GrupoProduto
    {
        $grupoProduto['grupo_produto_tipo'] = $this->defineTipoGrupoProduto($grupoProduto['grupo_produto_tipo']);
        if ($this->consultaGrupoProdutoPorNome($grupoProduto['grupo_produto_nome'])) return GrupoProdutoException::grupoProdutoJaExistente($grupoProduto['grupo_produto_nome']);
        return $this->grupoRepository->cadastro($grupoProduto);
    }

    public function listagemGrupos(): Collection {
        $grupos = $this->grupoRepository->listagemTotalGrupo();
        for($i = 0; $i < count($grupos); $i += 1) {
            $grupos[$i]['grupo_produto_tipo'] = $this->resolveTipoGrupoProduto(strtoupper($grupos[$i]['grupo_produto_tipo']));
        }
        return $grupos;
    }

    /**
     * @throws GrupoProdutoException
     */
    public function buscaGrupoPorId(int $id): array|GrupoProdutoException {
        $grupo = $this->grupoRepository->grupoPorId($id)->toArray();
        if (empty($grupo[0])) return GrupoProdutoException::grupoNaoExiste();
        $grupo[0]['grupo_produto_tipo'] = $this->resolveTipoGrupoProduto(strtoupper($grupo[0]['grupo_produto_tipo']));
        return $grupo[0];
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

    private function resolveTipoGrupoProduto(string $tipo): TiposRetornoGruposEnum|GrupoProdutoException {
        return match ($tipo) {
            'F' => TiposRetornoGruposEnum::F,
            'M' => TiposRetornoGruposEnum::M,
            'E' => TiposRetornoGruposEnum::E,
            'S' => TiposRetornoGruposEnum::S,
            'O' => TiposRetornoGruposEnum::O,
            default => GrupoProdutoException::tipoGrupoProdutoNaoExistente($tipo)
        };
    }

    private function consultaGrupoProdutoPorNome(string $grupoNome): ?GrupoProduto {
        return $this->grupoRepository->grupoProdutoPorNome($grupoNome);
    }
}
