<?php

namespace App\Http\Requests;

class RequestPadroes {
    public static $string = 'O campo deve receber apenas valores string.';
    public static $required = 'Esse campo é obrigatório, por favor, informe-o.';
    public static $email = 'O email informado é inválido.';


    public static function mensagemMax(int $valorMaximo): string {
        return 'Esse campo tem que conter no máximo ' . $valorMaximo . ' caracteres.';
    }
}
