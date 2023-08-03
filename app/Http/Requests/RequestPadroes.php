<?php

namespace App\Http\Requests;

class RequestPadroes {
    public static $string = 'O campo deve receber apenas valores string.';
    public static $required = 'Esse campo é obrigatório, por favor, informe-o.';
    public static $email = 'O email informado é inválido.';
    public static $image = 'O campo deve receber apenas imagens.';
    public static $integer = 'O campo deve receber apenas inteiros.';
    public static $array = 'O campo deve receber apenas arrays.';

    public static function mensagemMax(int $valorMaximo): string {
        return 'Esse campo tem que conter no máximo ' . $valorMaximo . ' caracteres.';
    }

    public static function mensagemMimes(array $valorMimes): string {
        return 'A extensão do arquivo deve ser ' . implode(' ou ', $valorMimes) . '.';
    }

    public static function mensagemExists(string $tabela): string {
        return 'O id não existe na tabela ' . $tabela . '.';
    }
}
