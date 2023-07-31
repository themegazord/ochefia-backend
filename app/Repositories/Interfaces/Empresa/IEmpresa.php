<?php

namespace App\Repositories\Interfaces\Empresa;

use App\Models\Empresa;

interface IEmpresa {
    public function cadastro(array $empresa): Empresa;
    public function empresaPorCNPJ(string $cnpj): ?Empresa;
}
