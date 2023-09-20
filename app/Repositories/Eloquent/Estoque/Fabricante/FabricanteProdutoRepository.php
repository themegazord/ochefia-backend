<?php

namespace App\Repositories\Eloquent\Estoque\Fabricante;

use App\Models\FabricanteProduto;
use App\Repositories\Interfaces\Estoque\Fabricante\IFabricanteProduto;

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
}
