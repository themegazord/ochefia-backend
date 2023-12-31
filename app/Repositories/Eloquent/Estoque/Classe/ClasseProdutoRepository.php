<?php

namespace App\Repositories\Eloquent\Estoque\Classe;

use App\Models\ClasseProduto;
use App\Repositories\Interfaces\Estoque\Classe\IClasseProduto;
use Illuminate\Database\Eloquent\Collection;

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

    public function listagemClasseProduto(): Collection
    {
        return ClasseProduto::query()
            ->get([
                'classe_produto_id',
                'classe_produto_nome'
            ]);
    }

    public function classeProdutoPorId(int $id): ?ClasseProduto
    {
        return ClasseProduto::query()
            ->where('classe_produto_id', $id)
            ->first();
    }

    public function atualizaClassePorId(array $classe, int $id): int
    {
        return ClasseProduto::query()
            ->where('classe_produto_id', $id)
            ->update($classe);
    }

    public function removeClassePorId(int $id): mixed
    {
        return ClasseProduto::query()
            ->where('classe_produto_id', $id)
            ->delete();
    }
}
