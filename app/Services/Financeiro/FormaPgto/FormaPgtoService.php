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

    public function listagemFormaPgtoPorEmpresa(object $empresa): array {
        return $this->formaPgtoRepostory->listagemFormasPgtoPorEmpresa($empresa)->toArray();
    }

    public function consultaFormaPgtoPorEmpresa(object $empresa, string $id): FormaPgto|FormaPgtoException {
        $formaPgto = $this->formaPgtoRepostory->consultaFomaPgtoPorEmpresa($empresa, $id);
        if (is_null($formaPgto)) return FormaPgtoException::formaPgtoInexistente();
        return $formaPgto;
    }

    public function editaFormaPgtoPorEmpresa(array $formaPgto, object $empresa, string $id): mixed {
        if (is_null($this->formaPgtoRepostory->consultaFomaPgtoPorEmpresa($empresa, $id))) return FormaPgtoException::formaPgtoInexistente();
        return $this->formaPgtoRepostory->editaFormaPgtoPorEmpresa($formaPgto, $empresa, $id);
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
