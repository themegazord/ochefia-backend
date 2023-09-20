<?php

namespace App\Repositories\Eloquent\Estoque\Fabricante;

use App\Models\FabricanteProduto;
use App\Repositories\Interfaces\Estoque\Fabricante\IFabricanteProduto;
use Illuminate\Database\Eloquent\Collection;

class FabricanteProdutoRepository implements IFabricanteProduto
{

    public function cadastro(array $fabricante): FabricanteProduto
    {
        return FabricanteProduto::query()
            ->create($fabricante);
    }

    public function fabricanteProdutoPorNome(string $nomeFabricante): ?FabricanteProduto
    {
        return FabricanteProduto::query()
            ->where('fabricante_produto_nome', $nomeFabricante)
            ->first();
    }

    public function listagemFabricantes(): Collection
    {
        return FabricanteProduto::query()
            ->get([
                'fabricante_produto_id',
                'fabricante_produto_nome'
            ]);
    }

    public function fabricantePorId(int $id): ?FabricanteProduto
    {
        return FabricanteProduto::query()
            ->where('fabricante_produto_id', $id)
            ->first([
                'fabricante_produto_id',
                'fabricante_produto_nome'
            ]);
    }
}
