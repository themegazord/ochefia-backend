<?php

namespace App\Services\Estoque\Unidade;

use App\Exceptions\UnidadeException;
use App\Models\Unidade;
use App\Repositories\Interfaces\Estoque\Unidade\IUnidade;
use Illuminate\Database\Eloquent\Collection;

class UnidadeService
{
    public function __construct(
        private readonly IUnidade $unidadeRepository
    )
    {
    }

    /**
     * @throws UnidadeException
     */
    public function cadastro(array $unidade): Unidade|UnidadeException {
        if ($this->consultaUnidadePeloNome($unidade['unidade_nome'])) return UnidadeException::unidadeDeMedidaJaExiste($unidade['unidade_nome']);
        $unidade['unidade_nome'] = strtoupper($unidade['unidade_nome']);
        return $this->unidadeRepository->cadastro($unidade);
    }

    public function listagemUnidade(): Collection {
        return $this->unidadeRepository->listagemUnidade();
    }

    /**
     * @throws UnidadeException
     */
    public function unidadePorId(int $id): Unidade|UnidadeException {
        $unidade = $this->unidadeRepository->unidadePorId($id);
        return is_null($unidade) ? UnidadeException::unidadeInexistente() : $unidade;
    }

    private function consultaUnidadePeloNome(string $unidade_nome): ?Unidade {
        return $this->unidadeRepository->unidadePorNome($unidade_nome);
    }
}
