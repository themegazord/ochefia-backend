# Cadastro de dias para prazo de pagamento ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastrar dias para prazo de pagamento dentro do sistema, afim de guardar as datas das parcelas para as formas de pagamento a prazo.

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Funidade%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro    | Tipo    | Descrição                                                      | Obrigatório? |
|--------------|---------|----------------------------------------------------------------|--------------|
| parcelas     | array   | Array para inserir as datas                                    | Sim          |  
| prazopgto_id | integer | A id do prazo de pagamento ao qual as datas vão ser vinculadas | Sim          |
| dias         | integer | A quantidada de dias de cada intervalo                         | Sim          |

## Exemplo de requisição

```json
{
    "parcelas": [
        {
            "prazopgto_id": 1, // Nome desse prazo: 30/60/90 DIAS
            "dias": 30
        },
        {
            "prazopgto_id": 1, // Nome desse prazo: 30/60/90 DIAS
            "dias": 60
        },
        {
            "prazopgto_id": 1, // Nome desse prazo: 30/60/90 DIAS
            "dias": 90
        }
    ]
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                               |
|-----------|--------|-----------------------------------------|
| mensagem  | string | Dias para prazo de pagamento cadastrados com sucesso |
| unidade   | object | Unidade de medida cadastrado.           |

## Exemplo de resposta

```json
{
    "mensagem": "Dias para prazo de pagamento cadastrados com sucesso",
    "parcelas": [
        {
            "prazopgto_id": 1, 
            "dias": 30
        },
        {
            "prazopgto_id": 1,
            "dias": 60
        },
        {
            "prazopgto_id": 1,
            "dias": 90
        }
    ]
}
```

## Possibilidade de erro

| Código | Resposta                                        | Motivo                                                        |
|--------|-------------------------------------------------|---------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o. | Quando não for encaminhado algum dado que é obrigatório       |
| 422    | O campo deve receber apenas inteiros.           | Ao tentar inserir qualquer dado que não seja inteiro.         |
| 422    | O campo deve receber apenas arrays.             | Ao tentar inserir qualquer dado que não seja arrays.          |
| 422    | O id não existe na tabela prazo de pagamento    | Ao encaminhar uma id de um prazo de pagamento que não existe. |
