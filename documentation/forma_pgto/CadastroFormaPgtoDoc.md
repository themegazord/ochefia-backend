# Cadastro de formas de pagamento ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastro de novas formas de pagamento dentro da empresa.

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fformapgto%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro         | Tipo   | Descrição                                         | Obrigatório? |
|-------------------|--------|---------------------------------------------------|--------------|
| formapgto_nome    | string | Nome da forma de pagamento                        | Sim          |
| formapgto_tipo    | string | Tipo da forma de pagamento                        | Sim          |
| clientes_id       | int    | O ID do cadastro do cliente                       | Não          |
| prazopgto_id      | int    | O ID do prazo de pagamento padrão                 | Não          |

## Exemplo de requisição

```json
{
    "formapgto_nome": "Cartão de Credito VISA",
    "formapgto_tipo": "CDC"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                                 |
|-----------|--------|-------------------------------------------|
| mensagem  | string | Forma de pagamento cadastrada com sucesso |
| formapgto | object | Forma de pagamento criada                 |

## Exemplo de resposta

```json
{
    "mensagem": "Forma de pagamento cadastrada com sucesso",
    "formapgto": {
        "formapgto_nome": "Cartão de Credito VISA",
        "formapgto_tipo": "CARTAO_CREDITO",
        "updated_at": "2023-08-30T13:12:59.000000Z",
        "created_at": "2023-08-30T13:12:59.000000Z",
        "id": 1
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                          | Motivo                                                                                    |
|--------|-----------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                   | Quando não for encaminhado algum dado que é obrigatório                                   |
| 422    | O campo deve receber apenas valores string.                                       | Ao tentar inserir qualquer dado que não seja string                                       |
| 422    | O campo deve receber apenas inteiros.                                             | Ao tentar inserir qualquer dado que não seja inteiro                                      |
| 422    | Esse campo tem que conter no máximo 50 caracteres.                                | Ao encaminhar mais de 50 caracteres                                                       |
| 422    | Esse campo tem que conter no máximo 30 caracteres.                                | Ao encaminhar mais de 30 caracteres                                                       |
| 422    | O id não existe na tabela clientes.                                               | Ao inserir um id de um cliente que não existe                                             |
| 422    | O id não existe na tabela prazo de pagamento.                                     | Ao inserir um id de um prazo de pagamento que não existe                                  |
| 400    | O tipo \[ formapgto_tipo \] não faz parte dos tipos de forma de pagamento padrão. | Ao cadastrar um tipo de forma de pagamento que não seja do padrão instaurado pelo sistema |


## Tipos de pagamento válidos

1. DIN = Dinheiro
2. CDC = Cartão de crédito
3. CDB = Cartão de débito
4. BOL = Boleto
5. VAL = Vale alimentação
6. VRE = Vale refeição
