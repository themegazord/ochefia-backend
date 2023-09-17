# Remoção de grupo de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para deletar um grupo de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/DELETE-%2Fapi%2Fv1%2Fgrupo__produto%2Fgrupo/{id}-%23F93E3E)

## Parametro do endpoint

| Parametro | Tipo    | Descrição                      |
|-----------|---------|--------------------------------|
| id        | integer | Id do grupo que deseja deletar |

## Possibilidade de erro

| Código | Resposta           | Motivo                                    |
|--------|--------------------|-------------------------------------------|
| 404    | O grupo não existe | Ao tentar deletar um grupo que não existe |
