<?php

namespace App\Enums\FormaPagamento\PrazoPgto;

enum TiposFormasPrazoPgtoEnum:string
{
    case DINHEIRO = 'DIN';
    case CARTAO_CREDITO = 'CDC';
    case CARTAO_DEBITO = 'CDB';
    case BOLETO = 'BOL';
    case VALE_ALIMENTACAO = 'VAL';
    case VALE_REFEICAO = 'VRE';
}
