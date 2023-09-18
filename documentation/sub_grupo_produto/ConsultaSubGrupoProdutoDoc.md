# Consulta de sub grupo de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para consulta de sub grupo de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Fsub__grupo__produto%2Fsub__grupo/{id}-%2361AFFE)

## Parametro do endpoint

| Parametro | Tipo    | Descrição                            |
|-----------|---------|--------------------------------------|
| id        | integer | Id do sub grupo que deseja consultar |

## Parametro de resposta

| Parametro | Tipo  | Descrição                        |
|-----------|-------|----------------------------------|
| sub_grupo | array | Sub grupo de produtos consultado |

## Exemplo de resposta

```json
{
    "sub_grupo": {
        "sub_grupo_produto_id": 5,
        "sub_grupo_produto_nome": "ITALIANOS"
    }
}
```

## Possibilidade de erro

| Código | Resposta               | Motivo                                          |
|--------|------------------------|-------------------------------------------------|
| 404    | O sub grupo não existe | Ao tentar consultar um sub grupo que não existe |
