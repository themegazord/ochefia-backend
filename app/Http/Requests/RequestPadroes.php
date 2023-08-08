<?php

namespace App\Http\Requests;

class RequestPadroes {
    public static string $string = 'O campo deve receber apenas valores string.';
    public static string $required = 'Esse campo é obrigatório, por favor, informe-o.';
    public static string $email = 'O email informado é inválido.';
    public static string $integer = 'O campo deve receber apenas inteiros.';
    public static string $array = 'O campo deve receber apenas arrays.';
    public static string $decimal = 'O campo deve receber apenas valores decimais.';

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
