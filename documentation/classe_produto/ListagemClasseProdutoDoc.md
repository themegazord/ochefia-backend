# Listagem de classes de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para listagem de classes de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Fclasse__produto%2Flistagem-%2361AFFE)

## Parametro de resposta

| Parametro | Tipo  | Descrição                               |
|-----------|-------|-----------------------------------------|
| classes   | array | Lista de classes de produtos cadastrado |

## Exemplo de resposta

```json
{
    "classes": [
        {
            "classe_produto_id": 3,
            "classe_produto_nome": "123"
        },
        {
            "classe_produto_id": 4,
            "classe_produto_nome": "GERAL"
        }
    ]
}
```
