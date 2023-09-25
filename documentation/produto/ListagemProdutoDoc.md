# Listagem de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para listagem de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Fproduto%2Flistagem%2F{empresa}-%2361AFFE)

## Parametros do endpoint

| Parametro | Descrição                                                              |
|-----------|------------------------------------------------------------------------|
| empresa   | Token da empresa que é devolvido quando um funcionário loga no sistema |

## Parametro de resposta

| Parametro | Tipo  | Descrição                                |
|-----------|-------|------------------------------------------|
| produtos  | array | Lista de produtos de produtos cadastrado |

## Exemplo de resposta

```json
{
    "produtos": [
        {
            "produto_id": 1,
            "produto_nome": "IPhone 12 Pro",
            "produto_estoque": "50.00",
            "produto_preco": "2999.00"
        },
        {
            "produto_id": 4,
            "produto_nome": "Televisor LED 55\"",
            "produto_estoque": "30.00",
            "produto_preco": "2499.00"
        },
        {
            "produto_id": 5,
            "produto_nome": "Arroz Integral Orgânico",
            "produto_estoque": "100.00",
            "produto_preco": "6.99"
        },
        {
            "produto_id": 6,
            "produto_nome": "Tênis de Corrida Ultra Boost",
            "produto_estoque": "75.00",
            "produto_preco": "299.99"
        }
    ]
}
```
