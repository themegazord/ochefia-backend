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
}
