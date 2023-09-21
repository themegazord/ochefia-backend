# Edição do unidade de medida de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para editar um unidade de medida de produto dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/PUT-%2Fapi%2Fv1%2Funidade%2Funidade%2Fedicao%2F{id}-%23FCA130)

## Parametro de requisição

| Parametro    | Tipo   | Descrição                                   | Obrigatório? |
|--------------|--------|---------------------------------------------|--------------|
| unidade_nome | string | O novo nome da unidade de medida de produto | Sim          |

## Exemplo de requisição

```json
{
    "unidade_nome": "Metros"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                                |
|-----------|--------|------------------------------------------|
| mensagem  | string | Unidade de medida atualizada com sucesso |

## Exemplo de resposta

```json
{
    "mensagem": "Unidade de medida atualizada com sucesso"
}
```

## Possibilidade de erro

| Código | Resposta                                           | Motivo                                                  |
|--------|----------------------------------------------------|---------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.    | Quando não for encaminhado algum dado que é obrigatório |
| 422    | O campo deve receber apenas valores string.        | Ao tentar inserir qualquer dado que não seja string     |
| 422    | Esse campo tem que conter no máximo 50 caracteres. | Ao encaminhar mais de 50 caracteres                     |
| 404    | A unidade de medida é inexistente.                 | Ao tentar atualizar um unidade de medida que não existe |
