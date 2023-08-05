<?php

namespace App\Repositories\Interfaces\Cliente;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;

interface ICliente
{
    public function cadastro(array $cliente): Model ;
    public function clientePorCPF(string $cpf): ?Model ;
}
