<?php

namespace App\Services\Endereco;

use App\Actions\Endereco\ValidaDadosCEP;
use App\Models\Endereco;
use App\Repositories\Interfaces\Endereco\IEndereco;

class EnderecoService {
    public function __construct(
        private IEndereco $enderecoRepository,
        private ValidaDadosCEP $validaCEP)
    {

    }

    public function cadastro(array $endereco): Endereco {
        $this->validaCEP->verificaSeCPFExiste($endereco['endereco_cep']);
        return $this->enderecoRepository->cadastro($endereco);
    }
}
