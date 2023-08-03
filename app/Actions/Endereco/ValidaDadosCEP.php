<?php

namespace App\Actions\Endereco;

use App\Exceptions\EnderecoException;

class ValidaDadosCEP {
    private string $urlBase = 'https://viacep.com.br/ws/';
    public function verificaSeCPFExiste(string $cep): ?EnderecoException {
        $urlApi = $this->urlBase . $cep . '/json/';
        $resposta = json_decode(file_get_contents($urlApi), true);
        if (isset($resposta['erro'])) return EnderecoException::CEPNaoExiste($cep);
        return null;
    }
}
