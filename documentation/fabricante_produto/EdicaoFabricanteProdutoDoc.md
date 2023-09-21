# Edição do fabricante de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para editar um fabricante de produto dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/PUT-%2Fapi%2Fv1%2Ffabricante__produto%2Ffabricante%2Fedicao%2F{id}-%23FCA130)

## Parametro de requisição

| Parametro               | Tipo   | Descrição                            | Obrigatório? |
|-------------------------|--------|--------------------------------------|--------------|
| fabricante_produto_nome | string | O novo nome do fabricante de produto | Sim          |

## Exemplo de requisição

```json
{
    "fabricante_produto_nome": "Brastemp"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                         |
|-----------|--------|-----------------------------------|
| mensagem  | string | Fabricante atualizado com sucesso |

## Exemplo de resposta

```json
{
    "mensagem": "Fabricante atualizado com sucesso"
}
```

## Possibilidade de erro

| Código | Resposta                                           | Motivo                                                  |
|--------|----------------------------------------------------|---------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.    | Quando não for encaminhado algum dado que é obrigatório |
| 422    | O campo deve receber apenas valores string.        | Ao tentar inserir qualquer dado que não seja string     |
| 422    | Esse campo tem que conter no máximo 90 caracteres. | Ao encaminhar mais de 90 caracteres                     |
| 404    | O fabricante não existe                            | Ao tentar atualizar um fabricante que não existe        |
