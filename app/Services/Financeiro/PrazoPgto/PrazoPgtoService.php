<?php

namespace App\Services\Financeiro\PrazoPgto;

use App\Enums\Financeiro\PrazoPgto\TiposFormasPrazoPgtoEnum;
use App\Enums\Financeiro\PrazoPgto\TiposPrazoPgtoEnum;
use App\Exceptions\PrazoPgtoException;
use App\Repositories\Interfaces\Financeiro\PrazoPgto\IPrazoPgto;
use Illuminate\Database\Eloquent\Collection;

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

    public function listagemPrazoPgto(object $empresa): Collection {
        $prazos = $this->prazoPgtoRepository->listagemPrazoPgto($empresa);
        foreach ($prazos as $prazo) {
            $prazo["prazopgto_tipo"] = $this->facilitadorTipoFront($prazo["prazopgto_tipo"]);
        }
        return $prazos;
    }

    /**
     * @throws PrazoPgtoException
     */
    public function consultaPrazoPgtoPorEmpresa(object $empresa, string $prazopgto_id) {
        $prazo = $this->prazoPgtoRepository->consultaPrazoPgtoPorEmpresa($empresa, $prazopgto_id);
        if (is_null($prazo)) return PrazoPgtoException::prazoPgtoInexistente();
        $prazo["prazopgto_tipo"] = $this->facilitadorTipoFront($prazo["prazopgto_tipo"]);
        $prazo["prazopgto_tipoforma"] = $this->facilitadorTipoFormaFront($prazo["prazopgto_tipoforma"]);
        return $prazo;
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

    private function facilitadorTipoFront(string $tipo): string|PrazoPgtoException {
        return match ($tipo) {
            'A_VISTA' => 'A Vista',
            'A_PRAZO' => 'A Prazo',
            'ESPECIFICAR' => 'A Especificar',
            default => PrazoPgtoException::tipoFormaIncompativelComOsPadroes($tipo)
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

    /**
     * @throws PrazoPgtoException
     */
    private function facilitadorTipoFormaFront(string $tipoForma): string|PrazoPgtoException {
        foreach (explode(',', $tipoForma) as $tipo) {
            $novoArrayTipoForma[] = match ($tipo) {
                'DINHEIRO' => TiposFormasPrazoPgtoEnum::DINHEIRO->value,
                'CARTAO_CREDITO' => TiposFormasPrazoPgtoEnum::CARTAO_CREDITO->value,
                'CARTAO_DEBITO' => TiposFormasPrazoPgtoEnum::CARTAO_DEBITO->value,
                'BOLETO' => TiposFormasPrazoPgtoEnum::BOLETO->value,
                'VALE_ALIMENTACAO' => TiposFormasPrazoPgtoEnum::VALE_ALIMENTACAO->value,
                'VALE_REFEICAO' => TiposFormasPrazoPgtoEnum::VALE_REFEICAO->value,
                default => PrazoPgtoException::tipoFormaIncompativelComOsPadroes($tipo)
            };
        }
        return implode(',', $novoArrayTipoForma);
    }
}
