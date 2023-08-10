<?php

namespace App\Services\PrazoPgto;

use App\Enums\FormaPagamento\PrazoPgto\TiposFormasPrazoPgtoEnum;
use App\Enums\FormaPagamento\PrazoPgto\TiposPrazoPgtoEnum;
use App\Exceptions\PrazoPgtoException;
use App\Repositories\Interfaces\PrazoPgto\IPrazoPgto;

class PrazoPgtoService
{
    public function __construct(
        private readonly IPrazoPgto $prazoPgtoRepository
    )
    {
    }

    /**
     * @throws PrazoPgtoException
     */
    public function cadastro(array $prazoPgto) {
        $prazoPgto['prazopgto_tipoforma'] = $this->validaEDefineOTipoFormaCompativel($prazoPgto['prazopgto_tipoforma']);
        $prazoPgto['prazopgto_tipo'] = $this->validaEDefineOTipoCompativel($prazoPgto['prazopgto_tipo'])->name;
        return $this->prazoPgtoRepository->cadastro($prazoPgto);
    }

    /**
     * @throws PrazoPgtoException
     */
    private function validaEDefineOTipoCompativel(string $tipo): TiposPrazoPgtoEnum|PrazoPgtoException
    {
        return match ($tipo) {
            'V' => TiposPrazoPgtoEnum::A_VISTA,
            'P' => TiposPrazoPgtoEnum::A_PRAZO,
            'E' => TiposPrazoPgtoEnum::ESPECIFICAR,
            default => PrazoPgtoException::tipoIncompativelComOsPadroes($tipo)
        };
    }

    /**
     * @throws PrazoPgtoException
     */
    private function validaEDefineOTipoFormaCompativel(string $tipoForma): string|PrazoPgtoException {
        foreach (explode(',', $tipoForma) as $tipo) {
            $novoArrayTipoForma[] = match ($tipo) {
                'DIN' => TiposFormasPrazoPgtoEnum::DINHEIRO->name,
                'CDC' => TiposFormasPrazoPgtoEnum::CARTAO_CREDITO->name,
                'CDB' => TiposFormasPrazoPgtoEnum::CARTAO_DEBITO->name,
                'BOL' => TiposFormasPrazoPgtoEnum::BOLETO->name,
                'VAL' => TiposFormasPrazoPgtoEnum::VALE_ALIMENTACAO->name,
                'VRE' => TiposFormasPrazoPgtoEnum::VALE_REFEICAO->name,
                default => PrazoPgtoException::tipoFormaIncompativelComOsPadroes($tipo)
            };
        }
        return implode(',', $novoArrayTipoForma);
    }
}
