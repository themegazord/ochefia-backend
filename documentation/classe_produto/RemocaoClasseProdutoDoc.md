# Remoção de classe de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para deletar uma classe de produtos dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/DELETE-%2Fapi%2Fv1%2Fclasse__produto%2Fclasse/{id}-%23F93E3E)

## Parametro do endpoint

| Parametro | Tipo    | Descrição                       |
|-----------|---------|---------------------------------|
| id        | integer | Id da classe que deseja deletar |

## Possibilidade de erro

| Código | Resposta            | Motivo                                      |
|--------|---------------------|---------------------------------------------|
| 404    | A classe não existe | Ao tentar deletar uma classe que não existe |
