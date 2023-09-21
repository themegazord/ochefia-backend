# Consulta de fabricante de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para consulta de fabricante de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/GET-%2Fapi%2Fv1%2Ffabricante__produto%2Ffabricante/{id}-%2361AFFE)

## Parametro do endpoint

| Parametro | Tipo    | Descrição                             |
|-----------|---------|---------------------------------------|
| id        | integer | Id do fabricante que deseja consultar |

## Parametro de resposta

| Parametro          | Tipo  | Descrição                         |
|--------------------|-------|-----------------------------------|
| fabricante_produto | array | Fabricante de produtos consultado |

## Exemplo de resposta

```json
{
    "fabricante_produto": {
        "fabricante_produto_id": 5,
        "fabricante_produto_nome": "LG"
    }
}
```

## Possibilidade de erro

| Código | Resposta                | Motivo                                           |
|--------|-------------------------|--------------------------------------------------|
| 404    | O fabricante não existe | Ao tentar consultar um fabricante que não existe |
