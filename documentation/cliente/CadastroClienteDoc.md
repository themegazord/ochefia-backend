# Cadastro de clientes ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastro de clientes dentro da empresa.

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fcliente%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro                | Tipo   | Descrição                                      | Obrigatório? |
|--------------------------|--------|------------------------------------------------|--------------|
| cliente_nome             | string | Nome do cliente                                | Sim          |
| cliente_email            | string | Email do cliente                               | Sim          |
| cliente_senha            | string | Senha do cliente                               | Sim          |
| cliente_cpf              | string | CPF do cliente                                 | Sim          |                  
| cliente_telefone         | string | Telefone do cliente                            | Não          |
| cliente_telefone_contato | string | Telefone do cliente para contato               | Sim          |

## Exemplo de requisição

```json
{
    "cliente_nome": "Fulano de Tal",
    "cliente_email": "fulano@email.com",
    "cliente_senha": "1234",
    "cliente_cpf": "00000000000",
    "cliente_telefone": "67999999999",
    "cliente_telefone_contato": "67999999999"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                      |
|-----------|--------|--------------------------------|
| mensagem  | string | Cliente cadastrado com sucesso |
| dados     | object | Cliente criado                 |

## Exemplo de resposta

```json
{
    "mensagem": "Cliente cadastrado com sucesso",
    "dados": {
        "cliente": {
            "cliente_nome": "Fulano de Tal",
            "cliente_email": "fulano@gmail.com",
            "cliente_cpf": "00000000000",
            "cliente_telefone": "67999999999",
            "cliente_telefone_contato": "67999999999",
            "usuario_id": 14,
            "updated_at": "2023-08-14T13:22:09.000000Z",
            "created_at": "2023-08-14T13:22:09.000000Z",
            "id": 1
        },
        "login": {
            "token": "5|g0mE78v1Nh1JLoHlFoorAdACzhdaqeN85PYeUZP0",
            "user": {
                "id": 14,
                "name": "Fulano de Tal",
                "email": "fulano@gmail.com"
            }
        }
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                        | Motivo                                                      |
|--------|---------------------------------------------------------------------------------|-------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                 | Quando não for encaminhado algum dado que é obrigatório     |
| 422    | O campo deve receber apenas valores string.                                     | Ao tentar inserir qualquer dado que não seja string         |
| 422    | O campo deve receber apenas inteiros.                                           | Ao tentar inserir qualquer dado que não seja inteiro        |
| 422    | Esse campo tem que conter no máximo 255 caracteres.                             | Ao encaminhar mais de 255 caracteres                        |
| 422    | Esse campo tem que conter no máximo 11 caracteres.                              | Ao encaminhar mais de 11 caracteres                         |
| 422    | Esse campo tem que conter no máximo 20 caracteres.                              | Ao encaminhar mais de 20 caracteres                         |
| 409    | O CPF \[cliente_cpf\] já está cadastro, por favor, verifique e tente novamente. | Ao cadastrar um cliente onde o CPF já existe                |
| 400    | O CPF \[cliente_cpf\] é inválido, por favor, verifique e tente novamente.       | Ao cadastrar um cliente com um CPF inválido matematicamente |


## Explicação do funcionamento da rota

O sistema não contêm rota de cadastro, pois, internamente o backend já cadastro um usuário com os dados que são passados quando consumido essa rota.

O backend cria o usuário e vinculado o id dele a este cliente.
