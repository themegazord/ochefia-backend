<?php

namespace App\Repositories\Interfaces\Endereco;

use App\Models\Endereco;

interface IEndereco {
    public function cadastro(array $endereco): Endereco;
}
