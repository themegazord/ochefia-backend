# Remoção de fabricante de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para deletar um fabricante de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/DELETE-%2Fapi%2Fv1%2Ffabricante__produto%2Ffabricante/{id}-%23F93E3E)

## Parametro do endpoint

| Parametro | Tipo    | Descrição                           |
|-----------|---------|-------------------------------------|
| id        | integer | Id do fabricante que deseja deletar |

## Possibilidade de erro

| Código | Resposta                | Motivo                                         |
|--------|-------------------------|------------------------------------------------|
| 404    | O fabricante não existe | Ao tentar deletar um fabricante que não existe |
