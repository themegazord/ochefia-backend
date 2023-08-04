# Login ![Static Badge](https://img.shields.io/badge/Rota_n%C3%A3o_autenticada-%23F93E3E)

## Explicação da rota

Rota utilizada para autenticação do usuário dentro do sistema

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fautenticacao%2Flogin-%2349CC90)

## Parametro de requisição

| Parametro | Tipo   | Descrição        | Obrigatório? |
|-----------|--------|------------------|--------------|
| email     | string | Email do usuário | Sim          |
| password  | string | Senha do usuário | Sim          |

## Exemplo de requisição

```json
{
    "email": "joe_doe@email.com",
    "password": "1234"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                                                   |
|-----------|--------|-------------------------------------------------------------|
| message   | object | Objeto contendo token de autenticação e os dados do usuário |
| token     | string | Token de autenticação do usuário                            |
| user      | object | Dados do usuário que foi logado                             |

## Exemplo de resposta

```json
    "message": {
        "token": "5|FggYlCsXzqKISnrGA6NHZzJtQaRD2YGMZQ1yDPvf",
        "user": {
            "id": 10,
            "name": "Joe",
            "lastname": "Doe",
            "email": "joe_doe@email.com"
        }
    }
```

## Possibilidade de erro

| Código | Resposta                                                                          | Motivo                                                                               |
|--------|-----------------------------------------------------------------------------------|--------------------------------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                   | Quando esquecer de encaminhar algum campo que é obrigatório.                         |
| 422    | O email informado é inválido.                                                     | Ao tentar enviar um email inválido                                                   |
| 422    | O campo deve receber apenas valores string.                                       | Ao passar qualquer outro tipo de dado para o campo, ser ser string                   |
| 422    | Esse campo tem que conter no máximo 255 caracteres.                               | Ao passar mais do que 255 caracteres                                                 |
| 404    | O email inserido não está cadastrado, insira um válido ou se cadastre no sistema. | Ao tentar entrar no sistema com um email que não existe                              |
| 409    | A senha é inválida.                                                               | Ao tentar entrar no sistema com uma senha que não é a cadastrada com o email enviado |
