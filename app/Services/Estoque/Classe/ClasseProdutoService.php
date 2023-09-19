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

    /**
     * @throws ClasseProdutoException
     */
    public function consultaClasseProdutoPorId(int $id): array|ClasseProdutoException|null {
        $classe = $this->classeProdutoRepository->classeProdutoPorId($id);
        return is_null($classe) ? ClasseProdutoException::classeInexistente() : $classe->only(['classe_produto_id', 'classe_produto_nome']);
    }

    /**
     * @throws ClasseProdutoException
     */
    public function atualizaClasseProdutoPorId(array $classe, int $id): int|ClasseProdutoException {
        if ($this->verificaClasseExiste($id)) return ClasseProdutoException::classeInexistente();
        $classe['classe_produto_nome'] = strtoupper($classe['classe_produto_nome']);
        return $this->classeProdutoRepository->atualizaClassePorId($classe, $id);
    }

    private function consultaClasseProdutoPorNome(string $nomeClasseProduto): ?ClasseProduto {
        return $this->classeProdutoRepository->classeProdutoPorNome($nomeClasseProduto);
    }

    private function verificaClasseExiste(int $id): bool {
        $classe = $this->classeProdutoRepository->classeProdutoPorId($id);
        return is_null($classe);
    }

}
