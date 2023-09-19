# Consulta de classe de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para consulta de classe de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Fclasse__produto%2Fclasse/{id}-%2361AFFE)

## Parametro do endpoint

| Parametro | Tipo    | Descrição                         |
|-----------|---------|-----------------------------------|
| id        | integer | Id da classe que deseja consultar |

## Parametro de resposta

| Parametro | Tipo  | Descrição                     |
|-----------|-------|-------------------------------|
| classe    | array | classe de produtos consultado |

## Exemplo de resposta

```json
{
    "classe_produto": {
        "classe_produto_id": 8,
        "classe_produto_nome": "GELADEIRAS"
    }
}
```

## Possibilidade de erro

| Código | Resposta            | Motivo                                        |
|--------|---------------------|-----------------------------------------------|
| 404    | A classe não existe | Ao tentar consultar uma classe que não existe |
