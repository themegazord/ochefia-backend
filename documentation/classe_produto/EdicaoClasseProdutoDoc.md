# Edição da classe de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para editar uma classe de produto dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/PUT-%2Fapi%2Fv1%2Fclasse__produto%2Fedicao%2F{id}-%23FCA130)

## Parametro de requisição

| Parametro           | Tipo   | Descrição                               | Obrigatório? |
|---------------------|--------|-----------------------------------------|--------------|
| classe_produto_nome | string | O novo nome da classe de produto        | Sim          |

## Exemplo de requisição

```json
{
    "classe_produto_nome": "Geladeiras"
}
```

## Parametro de resposta

| Parametro      | Tipo   | Descrição                     |
|----------------|--------|-------------------------------|
| mensagem       | string | Classe atualizado com sucesso |
| classe_produto | object | Classe de produto atualizado. |

## Exemplo de resposta

```json
{
    "mensagem": "Classe atualizada com sucesso",
    "classe_produto": {
        "classe_produto_nome": "GELADEIRAS"
    }
}
```

## Possibilidade de erro

| Código | Resposta                                           | Motivo                                                  |
|--------|----------------------------------------------------|---------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.    | Quando não for encaminhado algum dado que é obrigatório |
| 422    | O campo deve receber apenas valores string.        | Ao tentar inserir qualquer dado que não seja string     |
| 422    | Esse campo tem que conter no máximo 50 caracteres. | Ao encaminhar mais de 50 caracteres                     |
| 404    | A classe não existe                                | Ao tentar atualizar uma classe que não existe"          |
