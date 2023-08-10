<?php

namespace App\Services\Estoque\Unidade;

use App\Exceptions\UnidadeException;
use App\Models\Unidade;
use App\Repositories\Interfaces\Unidade\IUnidade;

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

    private function consultaUnidadePeloNome(string $unidade_nome): ?Unidade {
        return $this->unidadeRepository->unidadePorNome($unidade_nome);
    }
}
