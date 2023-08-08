# Cadastro de classe de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastrar classes de produtos dentro do sistema, afim de, organizar e auxiliar em relatórios futuros

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fclasse__produto%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro           | Tipo   | Descrição                   | Obrigatório? |
|---------------------|--------|-----------------------------|--------------|
| classe_produto_nome | string | O nome da classe de produto | Sim          |

## Exemplo de requisição

```json
{
    "classe_produto_nome": "Geral"
}
```

## Parametro de resposta

| Parametro      | Tipo   | Descrição                                 |
|----------------|--------|-------------------------------------------|
| mensagem       | string | Classe de produtos cadastrado com sucesso |
| classe_produto | object | Classe de produto cadastrado.             |

## Exemplo de resposta

```json
{
    "mensagem": "Classe de produtos cadastrado com sucesso",
    "classe_produto": {
        "classe_produto_nome": "GERAL",
        "updated_at": "2023-08-08T14:05:26.000000Z",
        "created_at": "2023-08-08T14:05:26.000000Z",
        "id": 1
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                         | Motivo                                                   |
|--------|----------------------------------------------------------------------------------|----------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                  | Quando não for encaminhado algum dado que é obrigatório  |
| 422    | O campo deve receber apenas valores string.                                      | Ao tentar inserir qualquer dado que não seja string      |
| 422    | Esse campo tem que conter no máximo 50 caracteres.                               | Ao encaminhar mais de 50 caracteres                      |
| 409    | A classe de produtos \[classe_produto_nome\] já existe, cadastre outra ou use-a. | Ao tentar cadastrar uma classe de produtos que já existe |
