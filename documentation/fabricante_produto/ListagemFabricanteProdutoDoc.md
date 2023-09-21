# Listagem de fabricante de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para listagem de fabricante de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Ffabricante__produto%2Flistagem-%2361AFFE)

## Parametro de resposta

| Parametro   | Tipo  | Descrição                                   |
|-------------|-------|---------------------------------------------|
| fabricantes | array | Lista de fabricantes de produtos cadastrado |

## Exemplo de resposta

```json
{
    "fabricantes": [
        {
            "fabricante_produto_id": 1,
            "fabricante_produto_nome": "PãO DE AçUCAR"
        },
        {
            "fabricante_produto_id": 4,
            "fabricante_produto_nome": "SAMSUNG"
        },
        {
            "fabricante_produto_id": 5,
            "fabricante_produto_nome": "LG"
        }
    ]
}
```
