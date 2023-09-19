<?php

namespace App\Repositories\Interfaces\Estoque\Classe;

use App\Models\ClasseProduto;
use Illuminate\Database\Eloquent\Collection;

interface IClasseProduto
{
    public function cadastro(array $classeProduto): ClasseProduto;
    public function classeProdutoPorNome(string $nomeClasseProduto): ?ClasseProduto;
    public function listagemClasseProduto(): Collection;
    public function classeProdutoPorId(string $id):?ClasseProduto;
}
