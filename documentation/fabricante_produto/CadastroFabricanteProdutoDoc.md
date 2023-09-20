# Cadastro de fabricantes de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastrar fabricantes de produtos dentro do sistema, afim de, organizar e auxiliar em relatórios futuros

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Ffabricante__produto%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro               | Tipo   | Descrição                        | Obrigatório? |
|-------------------------|--------|----------------------------------|--------------|
| fabricante_produto_nome | string | O nome do fabricante de produtos | Sim          |

## Exemplo de requisição

```json
{
    "fabricante_produto_nome": "Coca Cola"
}
```

## Parametro de resposta

| Parametro          | Tipo   | Descrição                                     |
|--------------------|--------|-----------------------------------------------|
| mensagem           | string | Fabricante de produtos cadastrado com sucesso |
| fabricante_produto | object | Fabricante de produtos cadastrado.            |

## Exemplo de resposta

```json
{
    "mensagem": "Fabricante de produtos cadastrado com sucesso",
    "fabricante_produto": {
        "fabricante_produto_nome": "COCA COLA",
        "updated_at": "2023-08-08T02:01:51.000000Z",
        "created_at": "2023-08-08T02:01:51.000000Z",
        "id": 2
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                                                 | Motivo                                                  |
|--------|----------------------------------------------------------------------------------------------------------|---------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                                          | Quando não for encaminhado algum dado que é obrigatório |
| 422    | O campo deve receber apenas valores string.                                                              | Ao tentar inserir qualquer dado que não seja string     |
| 422    | Esse campo tem que conter no máximo 90 caracteres.                                                       | Ao encaminhar mais de 90 caracteres                     |
| 409    | O fabricante \[fornecedor_produto_nome\] já existe no banco de dados, por favor, cadastro outro ou use-o | Ao tentar cadastrar um fabricante que já existe         |
