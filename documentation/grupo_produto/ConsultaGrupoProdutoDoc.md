# Consulta de grupo de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para consulta de grupo de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Fgrupo__produto%2Fgrupo/{id}-%2361AFFE)

## Parametro do endpoint

| Parametro | Tipo    | Descrição                        |
|-----------|---------|----------------------------------|
| id        | integer | Id do grupo que deseja consultar |

## Parametro de resposta

| Parametro | Tipo  | Descrição                    |
|-----------|-------|------------------------------|
| grupo     | array | Grupo de produtos consultado |

## Exemplo de resposta

```json
{
    "grupo": {
        "grupo_produto_id": 3,
        "grupo_produto_nome": "Gorjeta",
        "grupo_produto_tipo": "Serviços"
    }
}
```

## Possibilidade de erro

| Código | Resposta           | Motivo                                      |
|--------|--------------------|---------------------------------------------|
| 404    | O grupo não existe | Ao tentar consultar um grupo que não existe |
