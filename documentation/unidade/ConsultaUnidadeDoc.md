# Consulta de unidade de medida de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para consulta de unidade de medida de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Funidade%2Funidade/{id}-%2361AFFE)

## Parametro do endpoint

| Parametro | Tipo    | Descrição                                    |
|-----------|---------|----------------------------------------------|
| id        | integer | Id da unidade de medida que deseja consultar |

## Parametro de resposta

| Parametro | Tipo  | Descrição                                |
|-----------|-------|------------------------------------------|
| unidade   | array | Unidade de medida de produtos consultado |

## Exemplo de resposta

```json
{
    "unidade": {
        "unidade_id": 2,
        "unidade_nome": "METROS"
    }
}
```

## Possibilidade de erro

| Código | Resposta                          | Motivo                                                   |
|--------|-----------------------------------|----------------------------------------------------------|
| 404    | O unidade de medida é inexistente | Ao tentar consultar uma unidade de medida que não existe |
