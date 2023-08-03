<?php

namespace App\Services\Funcionario;

use App\Exceptions\FuncionarioException;
use App\Models\Funcionario;
use App\Repositories\Interfaces\Funcionarios\IFuncionario;
use Illuminate\Database\Eloquent\Collection;

class FuncionarioService {
    public function __construct(
        private IFuncionario $funcionarioRepository
    )
    {

    }

    public function cadastro(array $funcionario): Funcionario|FuncionarioException {
        if((bool)$this->funcionarioPorEmailEEmpresa($funcionario['funcionario_email'], $funcionario['empresa_id'])) return FuncionarioException::emailDeFuncionarioJaExistenteParaEssaEmpresa($funcionario['funcionario_email']);
        //Validação para garantir que o primeiro funcionário SEMPRE seja o dono
        if (!$this->verificaSeJaExisteFuncionarioNaEmpresa($funcionario['empresa_id']) && !$this->verificaSeOCargoPassadoFoiDono($funcionario['cargo'])){
            $funcionario['cargo'] = 'DONO';
        }
        $funcionario['cargo'] = strtoupper($funcionario['cargo']);
        $funcionario['acessos'] = $this->converteArrayDeAcessosParaString($funcionario['acessos']);
        return $this->funcionarioRepository->cadastro($funcionario);
    }

    private function funcionarioPorEmailEEmpresa(string $email, int $empresa_id): ?Funcionario {
        return $this->funcionarioRepository->funcionarioPorEmailEEmpresa($email, $empresa_id);
    }

    private function listagemDeFuncionarioPorEmpresa(int $empresa_id): Collection {
        return $this->funcionarioRepository->listagemDeFuncionarioPorEmpresa($empresa_id);
    }

    private function verificaSeJaExisteFuncionarioNaEmpresa(int $empresa_id): bool {
        return (bool)$this->listagemDeFuncionarioPorEmpresa($empresa_id)->toArray();
    }

    private function verificaSeOCargoPassadoFoiDono(string $cargo): bool {
        return strtoupper($cargo) === 'DONO';
    }

    private function converteArrayDeAcessosParaString(array $acessos): string {
        return implode(';', $acessos);
    }
}
