# Edição do sub grupo de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para editar um sub grupo de produto dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/PUT-%2Fapi%2Fv1%2Fsub__grupo__produto%2Fsub__grupo%2Fedicao%2F{id}-%23FCA130)

## Parametro de requisição

| Parametro              | Tipo   | Descrição                           | Obrigatório? |
|------------------------|--------|-------------------------------------|--------------|
| sub_grupo_produto_nome | string | O novo nome do sub grupo de produto | Sim          |

## Exemplo de requisição

```json
{
    "sub_grupo_produto_nome": "Gorjeta"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                        |
|-----------|--------|----------------------------------|
| mensagem  | string | Sub grupo atualizado com sucesso |

## Exemplo de resposta

```json
{
    "mensagem": "Sub grupo atualizado com sucesso"
}
```

## Possibilidade de erro

| Código | Resposta                                                                                             | Motivo                                                  |
|--------|------------------------------------------------------------------------------------------------------|---------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                                      | Quando não for encaminhado algum dado que é obrigatório |
| 422    | O campo deve receber apenas valores string.                                                          | Ao tentar inserir qualquer dado que não seja string     |
| 422    | Esse campo tem que conter no máximo 30 caracteres.                                                   | Ao encaminhar mais de 30 caracteres                     |
| 404    | O grupo não existe                                                                                   | Ao tentar atualizar um sub grupo que não existe         |
