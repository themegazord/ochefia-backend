<?php

namespace App\Repositories\Eloquent\Cliente;

use App\Models\Cliente;
use App\Repositories\Interfaces\Cliente\ICliente;
use Illuminate\Database\Eloquent\Model;

class ClienteRepository implements ICliente
{
    public function cadastro(array $cliente): Model
    {
        return Cliente::query()
            ->create($cliente);
    }

    public function clientePorCPF(string $cpf): ?Model
    {
        return Cliente::query()
            ->where('cliente_cpf', $cpf)
            ->first();
    }
}
