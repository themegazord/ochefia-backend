# Cadastro de Funcionários ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastro de funcionários dentro da empresa.

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Ffuncionario%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro         | Tipo   | Descrição                                          | Obrigatório? |
|-------------------|--------|----------------------------------------------------|--------------|
| empresa_id        | int    | O código da empresa que o funcíonário é vinculado  | Sim          |
| endereco_id       | int    | O código do endereço que o funcionário é vinculado | Não          |
| funcionario_nome  | string | Nome do funcionário                                | Sim          |
| funcionario_email | string | Email do funcionário                               | Sim          |
| funcionario_senha | string | Senha do funcionário                               | Sim          |
| cargo             | string | Cargo do funcionário                               | Sim          |
| acessos           | array  | Array de acessos do funcionário dentro do sistema  | Sim          |

## Exemplo de requisição

```json
{
    "empresa_id": 1,
    "endereco_id": 1,
    "funcionario_nome": "Fulano de Tal",
    "funcionario_email": "fulano@email.com",
    "funcionario_senha": "1234",
    "cargo": "Estoquista",
    "acessos": ["produtos/cadastro", "produto/listagem", "produto/editar/[produto_id]", "produto/apagar/[produto_id]", "produto/detalhes/[produto_id]"]
}
```

## Parametro de resposta

| Parametro   | Tipo   | Descrição                          |
|-------------|--------|------------------------------------|
| mensagem    | string | Funcionário cadastrado com sucesso |
| funcionario | object | Funcionário criado                 |

## Exemplo de resposta

```json
{
    "mensagem": "Funcionário cadastrado com sucesso",
    "funcionario": {
        "empresa_id": 1,
        "endereco_id": 1,
        "funcionario_nome": "Fulano de Tal",
        "funcionario_email": "fulano@email.com",
        "funcionario_senha": "1234",
        "cargo": "ESTOQUISTA",
        "acessos": "produtos/cadastro;produto/listagem;produto/editar/[produto_id];produto/apagar/[produto_id];produto/detalhes/[produto_id]",
        "usuario_id": 5,
        "updated_at": "2023-08-04T02:41:16.000000Z",
        "created_at": "2023-08-04T02:41:16.000000Z",
        "id": 2
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                 | Motivo                                                             |
|--------|--------------------------------------------------------------------------|--------------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                          | Quando não for encaminhado algum dado que é obrigatório            |
| 422    | O campo deve receber apenas valores string.                              | Ao tentar inserir qualquer dado que não seja string                |
| 422    | O campo deve receber apenas inteiros.                                    | Ao tentar inserir qualquer dado que não seja inteiro               |
| 422    | O campo deve receber apenas arrays..                                     | Ao tentar inserir qualquer dado que não seja array                 |
| 422    | Esse campo tem que conter no máximo 255 caracteres.                      | Ao encaminhar mais de 255 caracteres                               |
| 422    | Esse campo tem que conter no máximo 155 caracteres.                      | Ao encaminhar mais de 155 caracteres                               |
| 422    | Esse campo tem que conter no máximo 50 caracteres.                       | Ao encaminhar mais de 50 caracteres                                |
| 422    | O id não existe na tabela empresas.                                      | Ao inserir um id de uma empresa que não existe                     |
| 422    | O id não existe na tabela enderecos.                                     | Ao inserir um id de um endereço que não existe                     |
| 409    | O email \[email\] já está cadastro em sua empresa, por favor, verifique. | Ao cadastrar um funcionário com um e-mail que já existe na empresa |


## Explicação do funcionamento da rota

O sistema não contêm rota de cadastro, pois, internamente o backend já cadastro um usuário com os dados que são passados quando consumido essa rota.

O backend cria o usuário e vinculado o id dele a este funcionário.

Para continuar usando as rotas 
