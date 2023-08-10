<?php

namespace App\Services\Financeiro\PrazoPgtoDias;

use App\Exceptions\PrazoPgtoDiasException;
use App\Repositories\Interfaces\Financeiro\PrazoPgtoDias\IPrazoPgtoDias;

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
}
