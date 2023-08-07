# Cadastro de grupo de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastrar grupo de produtos dentro do sistema, afim de, organizar e auxiliar em relatórios futuros

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fgrupo__produto%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro          | Tipo   | Descrição                          | Obrigatório? |
|--------------------|--------|------------------------------------|--------------|
| grupo_produto_nome | string | O nome do grupo de produtos        | Sim          |
| grupo_produto_tipo | string | A tag do tipo de grupo de produtos | Sim          |

    As TAG's dos tipos de grupo de produtos são: PRODUTO_FINAL, MATERIA_PRIMA, EMBALAGEM, SERVICOS e OUTROS.
    1. PRODUTO_FINAL => Vai ser usado para produtos que serão utilizados para venda, ou seja, será apresentado para o cliente no cardápio digital
    2. MATERIA_PRIMA => São produtos de manipulação interna, ou seja, não aparecerá para o cliente no cardápio digital.
    3. EMBALAGEM => Caso seja cobrado a embalagem a parte, este tipo de produto aparecerá na nota fiscal, mas, não no cardápio digital.
    4. SERVICOS => Caso o cliente desejar tipificar algum tipo de serviço a ser cobrado de seu cliente, como, gorjetas, taxa de entregas, taxa de desperdicio e afins, aparecerá na nota fiscal mas não aparecerá no cardápio digital.
    5. OUTROS => Quaisquer outras situações que não se encaixam nas supracitadas

## Exemplo de requisição

```json
{
    "grupo_produto_nome": "Matéria prima",
    "grupo_produto_tipo": "MATERIA_PRIMA"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                               |
|-----------|--------|-----------------------------------------|
| mensagem  | string | Grupo de produto cadastrado com sucesso |
| grupo     | object | Grupo de produto cadastrado.            |

## Exemplo de resposta

```json
{
    "mensagem": "Grupo de produto cadastrado com sucesso",
    "grupo": {
        "grupo_produto_nome": "Materia prima",
        "grupo_produto_tipo": "materia_prima",
        "updated_at": "2023-08-07T16:10:31.000000Z",
        "created_at": "2023-08-07T16:10:31.000000Z",
        "id": 1
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                                                             | Motivo                                                                                             |
|--------|------------------------------------------------------------------------------------------------------|----------------------------------------------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                                      | Quando não for encaminhado algum dado que é obrigatório                                            |
| 422    | O campo deve receber apenas valores string.                                                          | Ao tentar inserir qualquer dado que não seja string                                                |
| 422    | Esse campo tem que conter no máximo 30 caracteres.                                                   | Ao encaminhar mais de 30 caracteres                                                                |
| 422    | Esse campo tem que conter no máximo 25 caracteres.                                                   | Ao encaminhar mais de 25 caracteres                                                                |
| 404    | O tipo de produto \[grupo_produto_tipo\] não existe no sistema, por favor, verificar na documentação | Ao passar qualquer valor no campo grupo_produto_tipo que não seja os já citados nesta documentação |
