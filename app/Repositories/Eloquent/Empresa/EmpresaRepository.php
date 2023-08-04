<?php

namespace App\Repositories\Eloquent\Empresa;

use App\Models\Empresa;
use App\Repositories\Interfaces\Empresa\IEmpresa;

class EmpresaRepository implements IEmpresa {
    public function cadastro(array $empresa): Empresa
    {
        return Empresa::query()
            ->create($empresa);
    }

    public function empresaPorCNPJ(string $cnpj): ?Empresa
    {
        return Empresa::query()
            ->where('empresa_cnpj', $cnpj)
            ->first();
    }

    public function quantidadeDeDonosPorEmpresa(int $empresa_id): ?Empresa
    {
        return Empresa::query()
            ->select(['empresa_id','quantidade_donos'])
            ->where('empresa_id', $empresa_id)
            ->first();
    }
}
