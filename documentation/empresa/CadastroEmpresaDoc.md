# Cadastro de Empresas ![Static Badge](https://img.shields.io/badge/Rota_n%C3%A3o_autenticada-%23F93E3E)

## Explicação de Rotas

Rota usada para cadastrar empresas dentro do sistema

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fempresa%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro         | Tipo               | Descrição            | Obrigatório? |
|-------------------|--------------------|----------------------|--------------|
| empresa_nome      | string             | Nome da empresa      | Sim          |
| empresa_cnpj      | string             | CNPJ da empresa      | Sim          |
| empresa_descricao | string             | Descrição da empresa | Sim          |
| empresa_logo      | image:png,jpg,jpeg | Logotipo da empresa  | Não          |

## Exemplo de requisição

```json
{
    "empresa_nome": "EMPRESA FICTICIA",
    "empresa_cnpj": "55276465000161",
    "empresa_descricao": "Bar"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                      |
|-----------|--------|--------------------------------|
| mensagem  | string | Empresa cadastrada com sucesso |
| empresa   | object | Empresa criada                 |

## Exemplo de resposta

```json
{
    "mensagem": "Empresa cadastrada com sucesso",
    "empresa": {
        "empresa_nome": "EMPRESA FICTICIA",
        "empresa_cnpj": "55276465000161",
        "empresa_descricao": "Bar",
        "updated_at": "2023-08-04T02:17:28.000000Z",
        "created_at": "2023-08-04T02:17:28.000000Z",
        "id": 4
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                                          | Motivo                                                                      |
|--------|---------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------|
| 422    | O campo deve receber apenas valores string.                                                       | Ao inserir qualquer tipo de dado que não seja string                        |
| 422    | Esse campo tem que conter no máximo 255 caracteres.                                               | Ao inserir mais de 255 caracteres                                           |
| 422    | Esse campo tem que conter no máximo 14 caracteres.                                                | Ao inserir mais de 14 caracteres                                            |
| 422    | Esse campo é obrigatório, por favor, informe-o.                                                   | Quando esquecer de encaminhar algum campo que é obrigatório.                |
| 422    | O campo deve receber apenas imagens.                                                              | Ao inserir qualquer tipo de dado sem ser uma imagem                         |
| 422    | A extensão do arquivo deve ser png ou jpg ou jpeg.                                                | Ao inserir uma imagem que não seja de extensão png, jpg e jpeg              |
| 409    | O CNPJ xxxxxxxxxxxxxx já existe no sistema, por favor, conecte-se com seu usuário vinculado a ele | Ao tentar cadastrar uma empresa com um CNPJ que já existe no banco de dados |
| 400    | O CNPJ xxxxxxxxxxxxxx é inválido, por favor, verificar.                                           | Ao tentar encaminhar um CNPJ matematicamente inválido                       |
