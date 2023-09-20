<?php

namespace App\Repositories\Interfaces\Estoque\Fabricante;

use App\Models\FabricanteProduto;

interface IFabricanteProduto
{
    public function cadastro(array $fabricante): FabricanteProduto;
    public function fabricanteProdutoPorNome(string $nomeFabricante): ?FabricanteProduto;
}
