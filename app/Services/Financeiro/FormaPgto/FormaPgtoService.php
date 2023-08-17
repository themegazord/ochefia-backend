<?php

namespace App\Services\Financeiro\FormaPgto;

use App\Enums\Financeiro\FormaPgto\TipoFormaPgtoEnum;
use App\Exceptions\FormaPgtoException;
use App\Models\FormaPgto;
use App\Repositories\Interfaces\Financeiro\FormaPgto\IFormaPgto;

class FormaPgtoService
{
    public function __construct(private readonly IFormaPgto $formaPgtoRepostory)
    {
    }

    /**
     * @throws FormaPgtoException
     */
    public function cadastro(array $formaPgto): FormaPgto|FormaPgtoException {
        $formaPgto['formapgto_tipo'] = $this->validaEDefineOTipoFormaPgtoCompativel($formaPgto['formapgto_tipo']);
        return $this->formaPgtoRepostory->cadastro($formaPgto);
    }

    /**
     * @throws FormaPgtoException
     */
    private function validaEDefineOTipoFormaPgtoCompativel(string $tipoFormaPgto): string|FormaPgtoException {
        return match ($tipoFormaPgto) {
            'DIN' => TipoFormaPgtoEnum::DINHEIRO->name,
            'CDC' => TipoFormaPgtoEnum::CARTAO_CREDITO->name,
            'CDB' => TipoFormaPgtoEnum::CARTAO_DEBITO->name,
            'BOL' => TipoFormaPgtoEnum::BOLETO->name,
            'VAL' => TipoFormaPgtoEnum::VALE_ALIMENTACAO->name,
            'VRE' => TipoFormaPgtoEnum::VALE_REFEICAO->name,
            default => FormaPgtoException::tipoFormaPgtoIncompativelComOsPadroes($tipoFormaPgto)
        };
    }
}
