# Listagem de unidade de medida de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para listagem de unidade de medida de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Funidade%2Flistagem-%2361AFFE)

## Parametro de resposta

| Parametro | Tipo  | Descrição                                          |
|-----------|-------|----------------------------------------------------|
| unidades  | array | Lista de unidades de medida de produtos cadastrado |

## Exemplo de resposta

```json
{
    "unidades": [
        {
            "unidade_id": 1,
            "unidade_nome": "KILO"
        },
        {
            "unidade_id": 4,
            "unidade_nome": "LITROS"
        }
    ]
}
```
