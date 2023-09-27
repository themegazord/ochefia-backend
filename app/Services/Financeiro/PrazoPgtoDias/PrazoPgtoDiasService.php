<?php

namespace App\Services\Financeiro\PrazoPgtoDias;

use App\Exceptions\PrazoPgtoDiasException;
use App\Models\PrazoPgtoDias;
use App\Repositories\Interfaces\Financeiro\PrazoPgtoDias\IPrazoPgtoDias;
use Illuminate\Database\Eloquent\Collection;

class PrazoPgtoDiasService
{
    public function __construct(
        private readonly IPrazoPgtoDias $prazoPgtoDiasRepository
    )
    {
    }

    /**
     * @throws PrazoPgtoDiasException
     */
    public function cadastro(array $prazoPgtoDias): array {
        foreach($prazoPgtoDias['parcelas'] as $parcela) {
            $this->prazoPgtoDiasRepository->cadastro($parcela);
        }
        return $prazoPgtoDias['parcelas'];
    }

    /**
     * @throws PrazoPgtoDiasException
     */
    public function consultaPrazoPgtoDiasPorEmpresa(object $empresa, string $prazopgto_id): Collection|PrazoPgtoDiasException {
        $prazoPgtoDias = $this->prazoPgtoDiasRepository->consultaPrazoPgtoDiasPorEmpresa($empresa, $prazopgto_id);
        if (empty($prazoPgtoDias->toArray())) return PrazoPgtoDiasException::prazoPgtoDiasInexistente();
        return $prazoPgtoDias;
    }
}
