<?php

namespace App\Services\Empresa;

use App\Exceptions\EmpresaException;
use App\Models\Empresa;
use App\Repositories\Interfaces\Empresa\IEmpresa;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


class EmpresaService {
    public function __construct(private IEmpresa $empresaRepository)
    {

    }

    public function cadastro(array $empresa) {
        $this->validaCNPJ($empresa['empresa_cnpj']);
        if((bool)$this->empresaPorCnpj($empresa['empresa_cnpj'])) return EmpresaException::CNPJExistente($empresa['empresa_cnpj']);
        return $this->empresaRepository->cadastro($empresa);
    }

    public function guardarImagem(UploadedFile $empresa_logo): string{
        $nomeImagem = md5($empresa_logo->getClientOriginalName() . strtotime('now')) . "." . $empresa_logo->extension();
        $empresa_logo->move(public_path('storage/empresa_logos'), $nomeImagem);

        return $nomeImagem;
    }

    public function quantidadeDeDonoPorEmpresa(int $empresa_id): ?Empresa {
        return $this->empresaRepository->quantidadeDeDonosPorEmpresa($empresa_id);
    }

    private function validaCNPJ(string $cnpj): bool|EmpresaException {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return EmpresaException::CNPJInvalido($cnpj);

        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return EmpresaException::CNPJInvalido($cnpj);

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return EmpresaException::CNPJInvalido($cnpj);

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    private function empresaPorCnpj(string $cnpj): ?Empresa {
        return $this->empresaRepository->empresaPorCNPJ($cnpj);
    }

}
