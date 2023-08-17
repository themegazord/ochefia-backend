<?php

namespace App\Enums\Financeiro\FormaPgto;

enum TipoFormaPgtoEnum:string
{
    case DINHEIRO = 'DIN';
    case CARTAO_CREDITO = 'CDC';
    case CARTAO_DEBITO = 'CDB';
    case BOLETO = 'BOL';
    case VALE_ALIMENTACAO = 'VAL';
    case VALE_REFEICAO = 'VRE';
}
