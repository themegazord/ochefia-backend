# Remoção de unidade de medida de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para deletar uma unidade de medida de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/DELETE-%2Fapi%2Fv1%2Funidade%2Funidade/{id}-%23F93E3E)

## Parametro do endpoint

| Parametro | Tipo    | Descrição                                  |
|-----------|---------|--------------------------------------------|
| id        | integer | Id da unidade de medida que deseja deletar |

## Possibilidade de erro

| Código | Resposta                          | Motivo                                                |
|--------|-----------------------------------|-------------------------------------------------------|
| 404    | O unidade de medida é inexistente | Ao tentar deletar um unidade de medida que não existe |
