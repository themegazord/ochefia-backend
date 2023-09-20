<?php

namespace App\Repositories\Interfaces\Estoque\Fabricante;

use App\Models\FabricanteProduto;
use Illuminate\Database\Eloquent\Collection;

interface IFabricanteProduto
{
    public function cadastro(array $fabricante): FabricanteProduto;
    public function fabricanteProdutoPorNome(string $nomeFabricante): ?FabricanteProduto;
    public function listagemFabricantes(): Collection;
    public function fabricantePorId(int $id): ?FabricanteProduto;
    public function atualizaFabricantePorId(array $fabricante, int $id): int ;
    public function removeFabricantePorId(int $id): mixed;
}
