# Listagem de subgrupo de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para listagem de subgrupo de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Fsub__grupo__produto%2Flistagem-%2361AFFE)

## Parametro de resposta

| Parametro | Tipo  | Descrição                                 |
|-----------|-------|-------------------------------------------|
| subgrupos | array | Lista de subgrupos de produtos cadastrado |

## Exemplo de resposta

```json
{
    "subgrupos": [
        {
            "sub_grupo_produto_id": 1,
            "sub_grupo_produto_nome": "TINTO"
        },
        {
            "sub_grupo_produto_id": 2,
            "sub_grupo_produto_nome": "TIO JOãO"
        }
    ]
}
```
