<?php

namespace App\Repositories\Interfaces\Estoque\Classe;

use App\Models\ClasseProduto;

interface IClasseProduto
{
    public function cadastro(array $classeProduto): ClasseProduto;

    public function classeProdutoPorNome(string $nomeClasseProduto): ?ClasseProduto;
}
