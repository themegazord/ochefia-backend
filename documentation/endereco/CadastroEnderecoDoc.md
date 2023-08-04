# Cadastro de Enderecos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastrar endereços utilizados nos cadastros de funcionários e cliente e na edição de empresas.

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fendereco%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro            | Tipo   | Descrição               | Obrigatório? |
|----------------------|--------|-------------------------|--------------|
| endereco_rua         | string | Nome da rua             | Sim          |
| endereco_numero      | int    | Número do endereço      | Sim          |
| endereco_complemento | string | Complemento do endereço | Não          |
| endereco_cep         | string | CEP do endereço         | Sim          |
| endereco_bairro      | string | Nome do bairro          | Sim          |
| endereco_cidade      | string | Nome da cidade          | Sim          |

## Exemplo de requisição

```json
{
    "endereco_rua": "Tv. Maria Vidal",
    "endereco_numero": 100,
    "endereco_complemento": "S/C",
    "endereco_cep": "69923000",
    "endereco_bairro": "Centro",
    "endereco_cidade": "Bujari"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                       |
|-----------|--------|---------------------------------|
| mensagem  | string | Endereço cadastrado com sucesso |
| endereco  | object | Endereço criado                 |

## Exemplo de resposta

```json
{
    "mensagem": "Endereço cadastrado com sucesso",
    "endereco": {
        "endereco_rua": "Tv. Maria Vidal",
        "endereco_numero": "100",
        "endereco_complemento": "S/C",
        "endereco_cep": "69923000",
        "endereco_bairro": "Centro",
        "endereco_cidade": "Bujari",
        "updated_at": "2023-08-04T02:28:51.000000Z",
        "created_at": "2023-08-04T02:28:51.000000Z",
        "id": 3
    }
}
```

## Possibilidade de erro

| Código | Resposta                                            | Motivo                                                         |
|--------|-----------------------------------------------------|----------------------------------------------------------------|
| 422    | O campo deve receber apenas valores string.         | Ao tentar inserir qualquer dado que não seja string            |
| 422    | Esse campo é obrigatório, por favor, informe-o.     | Quando não for encaminhado algum dado que é obrigatório        |
| 422    | O campo deve receber apenas inteiros.               | Ao tentar inserir qualquer dados que não seja inteiro          |
| 422    | Esse campo tem que conter no máximo 255 caracteres. | Ao encaminhar mais de 255 caracteres                           |
| 422    | Esse campo tem que conter no máximo 100 caracteres. | Ao encaminhar mais de 100 caracteres                           |
| 422    | Esse campo tem que conter no máximo 50 caracteres.  | Ao encaminhar mais de 50 caracteres                            |
| 422    | Esse campo tem que conter no máximo 50 caracteres.  | Ao encaminhar mais de 50 caracteres                            |
| 422    | Esse campo tem que conter no máximo 8 caracteres.   | Ao encaminhar mais de 8 caracteres                             |
| 422    | O CEP xxxxxxxx não existe.                          | Ao inserir qualquer CEP que seja inválido para a API do ViaCEP |
