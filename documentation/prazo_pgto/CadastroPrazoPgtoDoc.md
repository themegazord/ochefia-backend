# Cadastro de prazo de pagamentos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastrar prazos de pagamentos dentro do sistema

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fprazopgto%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro             | Tipo    | Descrição                                                                | Obrigatório? |
|-----------------------|---------|--------------------------------------------------------------------------|--------------|
| prazopgto_nome        | string  | O nome do prazo de pagamento                                             | Sim          |
| prazopgto_tipo        | char    | O tipo do prazo de pagamento                                             | Sim          |
| prazopgto_tipoforma   | string  | O(s) tipo(s) de forma(s) de pagamento que esse prazo vai poder ser usado | Sim          |
| fornecedor_produto_id | integer | O id do fornecedor do produto                                            | Sim          |

### Tipos válidos para `prazopgto_tipo`
1. V -> A Vista
2. P -> A Prazo
3. E -> A Especificar

### Tipos válidos para `prazopgto_tipoforma`
1. DIN -> Dinheiro
2. CDC -> Cartão de crédito
3. CDB -> Cartão de débito
4. BOL -> Boleto
5. VAL -> Vale de alimentação
6. VRE -> Vale de refeição

## Exemplo de requisição

```json
{
    "prazopgto_nome": "30/60D",
    "prazopgto_tipo": "V",
    "prazopgto_tipoforma": "DIN,BOL,CDB"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                                   |
|-----------|--------|---------------------------------------------|
| mensagem  | string | O prazo de pagamento foi criado com sucesso |
| prazopgto | object | Prazo de pagamento cadastrado.              |

## Exemplo de resposta

```json
{
    "mensagem": "O prazo de pagamento foi criado com sucesso",
    "prazopgto": {
        "prazopgto_nome": "30/60D",
        "prazopgto_tipo": "A_VISTA",
        "prazopgto_tipoforma": "DINHEIRO,BOLETO,CARTAO_DEBITO",
        "updated_at": "2023-08-09T20:53:45.000000Z",
        "created_at": "2023-08-09T20:53:45.000000Z",
        "id": 2
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                                    | Motivo                                                                                                                                                |
|--------|---------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                             | Quando não for encaminhado algum dado que é obrigatório                                                                                               |
| 422    | O campo deve receber apenas valores string.                                                 | Ao tentar inserir qualquer dado que não seja string                                                                                                   |
| 422    | Esse campo tem que conter no máximo 155 caracteres.                                         | Ao encaminhar mais de 155 caracteres                                                                                                                  |
| 409    | O tipo \[prazopgto_tipo\] não é compativel com os padrões do sistema, insira um válido      | Ao passar um tipo de prazo de pagamento que foge dos padrões do sistema [citados aqui](#tipos-válidos-para-prazopgto_tipo)                            | 
| 409    | O tipo \[prazopgto_tipoforma\] não é compativel com os padrões do sistema, insira um válido | Ao passar um tipo de forma de pagamento de prazo de pagamento que foge dos padrões do sistema [citados aqui](#tipos-válidos-para-prazopgto_tipoforma) | 

