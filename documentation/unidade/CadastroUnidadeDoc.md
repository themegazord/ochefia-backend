# Cadastro de unidades de medida ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastrar unidade de medida de produtos dentro do sistema, afim de, organizar e auxiliar em relatórios futuros

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Funidade%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro    | Tipo   | Descrição                   | Obrigatório? |
|--------------|--------|-----------------------------|--------------|
| unidade_nome | string | O nome da unidade de medida | Sim          |

## Exemplo de requisição

```json
{
    "sub_grupo_produto_nome": "Litros"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                                |
|-----------|--------|------------------------------------------|
| mensagem  | string | Unidade de medida cadastrada com sucesso |
| unidade   | object | Unidade de medida cadastrado.            |

## Exemplo de resposta

```json
{
    "mensagem": "Unidade de medida cadastrada com sucesso",
    "unidade": {
        "unidade_nome": "LITROS",
        "updated_at": "2023-08-08T02:01:51.000000Z",
        "created_at": "2023-08-08T02:01:51.000000Z",
        "id": 2
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                   | Motivo                                                  |
|--------|----------------------------------------------------------------------------|---------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                            | Quando não for encaminhado algum dado que é obrigatório |
| 422    | O campo deve receber apenas valores string.                                | Ao tentar inserir qualquer dado que não seja string     |
| 422    | Esse campo tem que conter no máximo 50 caracteres.                         | Ao encaminhar mais de 50 caracteres                     |
| 409    | A unidade de medida \[unidade_nome\] já existe, cadastre uma nova ou use-a | Ao tentar cadastrar uma unidade de medida que já existe |
