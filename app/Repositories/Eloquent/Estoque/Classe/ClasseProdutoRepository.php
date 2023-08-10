<?php

namespace App\Repositories\Eloquent\Estoque\Classe;

use App\Models\ClasseProduto;
use App\Repositories\Interfaces\Estoque\Classe\IClasseProduto;

class ClasseProdutoRepository implements IClasseProduto
{

    public function cadastro(array $classeProduto): ClasseProduto
    {
        return ClasseProduto::query()
            ->create($classeProduto);
    }

    public function classeProdutoPorNome(string $nomeClasseProduto): ?ClasseProduto
    {
        return ClasseProduto::query()
            ->where('classe_produto_nome', $nomeClasseProduto)
            ->first();
    }
}