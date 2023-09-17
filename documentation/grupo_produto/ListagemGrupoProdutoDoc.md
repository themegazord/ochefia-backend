# Listagem de grupo de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para listagem grupo de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Fgrupo__produto%2Flistagem-%2361AFFE)

## Parametro de resposta

| Parametro | Tipo  | Descrição                              |
|-----------|-------|----------------------------------------|
| grupos    | array | Lista de grupos de produtos cadastrado |

## Exemplo de resposta

```json
{
    "grupos": [
        {
            "grupo_produto_id": 1,
            "grupo_produto_nome": "Açucar",
            "grupo_produto_tipo": "Matéria Prima"
        },
        {
            "grupo_produto_id": 2,
            "grupo_produto_nome": "Arroz",
            "grupo_produto_tipo": "Matéria Prima"
        },
        {
            "grupo_produto_id": 3,
            "grupo_produto_nome": "Couvert",
            "grupo_produto_tipo": "Serviços"
        }
    ]
}
```
