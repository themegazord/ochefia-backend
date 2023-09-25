# Consulta de produto ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para consulta de produto dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Fproduto%2Fconsulta%2F{empresa}%2F{id}-%2361AFFE)

## Parametros do endpoint

| Parametro | Descrição                                                              |
|-----------|------------------------------------------------------------------------|
| empresa   | Token da empresa que é devolvido quando um funcionário loga no sistema |
| id        | Id do produto a ser consultado                                         |

## Parametro de resposta

| Parametro | Tipo  | Descrição          |
|-----------|-------|--------------------|
| produto   | array | Produto consultado |

## Exemplo de resposta

```json
{
    "produto": {
        "produto_id": 5,
        "empresa_id": 1,
        "grupo_produto_id": 6,
        "sub_grupo_produto_id": 6,
        "fabricante_produto_id": 9,
        "classe_produto_id": 3,
        "unidade_id": 6,
        "produto_nome": "Arroz Integral Orgânico",
        "produto_estoque": "100.00",
        "produto_preco": "6.99"
    }
}
```

## Possibilidade de erro

| Código | Resposta             | Motivo                                        |
|--------|----------------------|-----------------------------------------------|
| 404    | O produto não existe | Ao tentar consultar um produto que não existe |
