# Cadastro de sub grupo de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastrar sub grupo de produtos dentro do sistema, afim de, organizar e auxiliar em relatórios futuros

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fsub__grupo__produto%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro              | Tipo   | Descrição                       | Obrigatório? |
|------------------------|--------|---------------------------------|--------------|
| sub_grupo_produto_nome | string | O nome do sub grupo de produtos | Sim          |

## Exemplo de requisição

```json
{
    "sub_grupo_produto_nome": "Massas"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                                   |
|-----------|--------|---------------------------------------------|
| mensagem  | string | Sub grupo de produto cadastrado com sucesso |
| sub_grupo | object | Sub grupo de produto cadastrado.            |

## Exemplo de resposta

```json
{
    "mensagem": "Sub grupo de produto cadastrado com sucesso",
    "sub_grupo": {
        "sub_grupo_produto_nome": "MASSAS",
        "updated_at": "2023-08-07T19:25:23.000000Z",
        "created_at": "2023-08-07T19:25:23.000000Z",
        "id": 2
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                                                     | Motivo                                                                                   |
|--------|--------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                                              | Quando não for encaminhado algum dado que é obrigatório                                  |
| 422    | O campo deve receber apenas valores string.                                                                  | Ao tentar inserir qualquer dado que não seja string                                      |
| 422    | Esse campo tem que conter no máximo 30 caracteres.                                                           | Ao encaminhar mais de 30 caracteres                                                      |
| 409    | O sub grupo \[sub_grupo_produto_nome\] já existe, por favor, cadastre outro ou use o que já está cadastrado. | Ao passar qualquer valor no campo sub_grupo_produto_tipo que já exista no banco de dados |
