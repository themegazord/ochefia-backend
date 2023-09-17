# Edição do grupo de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para editar um grupo de produto dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fgrupo__produto%2Fedicao%2F{id}-%2349CC90)

## Parametro de requisição

| Parametro          | Tipo   | Descrição                              | Obrigatório? |
|--------------------|--------|----------------------------------------|--------------|
| grupo_produto_nome | string | O novo nome do grupo de produto        | Sim          |
| grupo_produto_tipo | string | A nova tag do tipo de grupo de produto | Sim          |

    As TAG's dos tipos de grupo de produtos são: PRODUTO_FINAL, MATERIA_PRIMA, EMBALAGEM, SERVICOS e OUTROS.
    1. PRODUTO_FINAL => Vai ser usado para produtos que serão utilizados para venda, ou seja, será apresentado para o cliente no cardápio digital
    2. MATERIA_PRIMA => São produtos de manipulação interna, ou seja, não aparecerá para o cliente no cardápio digital.
    3. EMBALAGEM => Caso seja cobrado a embalagem a parte, este tipo de produto aparecerá na nota fiscal, mas, não no cardápio digital.
    4. SERVICOS => Caso o cliente desejar tipificar algum tipo de serviço a ser cobrado de seu cliente, como, gorjetas, taxa de entregas, taxa de desperdicio e afins, aparecerá na nota fiscal mas não aparecerá no cardápio digital.
    5. OUTROS => Quaisquer outras situações que não se encaixam nas supracitadas

## Exemplo de requisição

```json
{
    "grupo_produto_nome": "Gorjeta",
    "grupo_produto_tipo": "SERVICOS"
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                    |
|-----------|--------|------------------------------|
| mensagem  | string | Grupo atualizado com sucesso |
| grupo     | object | Grupo de produto atualizado. |

## Exemplo de resposta

```json
{
    "mensagem": "Grupo atualizado com sucesso",
    "grupo": {
        "grupo_produto_nome": "Gorjeta",
        "grupo_produto_tipo": "SERVICOS"
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
| 409    | O grupo \[grupo_produto_nome\] já existe na base de dados, cadastre outro ou use-o.                  | Ao tentar cadastrar um grupo que já existe no banco de dados                                       |
| 404    | O tipo de produto \[grupo_produto_tipo\] não existe no sistema, por favor, verificar na documentação | Ao passar qualquer valor no campo grupo_produto_tipo que não seja os já citados nesta documentação |
| 404    | O grupo não existe                                                                                   | Ao tentar atualizar um grupo que não existe                                                        |
