<?php

namespace App\Services\Estoque\Classe;

use App\Exceptions\ClasseProdutoException;
use App\Models\ClasseProduto;
use App\Repositories\Interfaces\Estoque\Classe\IClasseProduto;

class ClasseProdutoService
{
    public function __construct(
        public readonly IClasseProduto $classeProdutoRepository
    )
    {
    }

    public function cadastro(array $classeProduto): ClasseProduto|ClasseProdutoException {
        if ($this->consultaClasseProdutoPorNome($classeProduto['classe_produto_nome'])) return ClasseProdutoException::classeProdutoJaExiste($classeProduto['classe_produto_nome']);
        $classeProduto['classe_produto_nome'] = strtoupper($classeProduto['classe_produto_nome']);
        return $this->classeProdutoRepository->cadastro($classeProduto);
    }

    public function listagemClasseProduto(): array {
        return $this->classeProdutoRepository->listagemClasseProduto()->toArray();
    }

    private function consultaClasseProdutoPorNome(string $nomeClasseProduto): ?ClasseProduto {
        return $this->classeProdutoRepository->classeProdutoPorNome($nomeClasseProduto);
    }
}
