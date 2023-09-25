# Remoção de produto ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para deletar um produto dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/DELETE-%2Fapi%2Fv1%2Fproduto%2Fremocao%2F{empresa}%2F{id}-%23F93E3E)

## Parametro do endpoint

| Parametro | Descrição                                                              |
|-----------|------------------------------------------------------------------------|
| empresa   | Token da empresa que é devolvido quando um funcionário loga no sistema |
| id        | Id do produto a ser removido                                           |

## Possibilidade de erro

| Código | Resposta             | Motivo                                      |
|--------|----------------------|---------------------------------------------|
| 404    | O produto não existe | Ao tentar deletar um produto que não existe |
