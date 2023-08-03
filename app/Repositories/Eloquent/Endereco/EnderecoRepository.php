<?php

namespace App\Repositories\Eloquent\Endereco;

use App\Models\Endereco;
use App\Repositories\Interfaces\Endereco\IEndereco;

class EnderecoRepository implements IEndereco {
    public function cadastro(array $endereco): Endereco
    {
        return Endereco::query()
            ->create($endereco);
    }
}
