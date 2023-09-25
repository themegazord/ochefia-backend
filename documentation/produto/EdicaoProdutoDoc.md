# Edição do produto ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para editar um produto dentro do sistema.

## URL

![Static Badge](https://img.shields.io/badge/PUT-%2Fapi%2Fv1%2Fproduto%2Fedicao%2F{empresa}%2F{id}-%23FCA130)


## Parametros do endpoint

| Parametro | Descrição                                                              |
|-----------|------------------------------------------------------------------------|
| empresa   | Token da empresa que é devolvido quando um funcionário loga no sistema |
| id        | Id do produto a ser atualizado                                         |

## Parametro de requisição

| Parametro             | Tipo    | Descrição                                        | Obrigatório? |
|-----------------------|---------|--------------------------------------------------|--------------|
| empresa_id            | integer | O id da empresa que o produto vai ser atualizado | Sim          |
| grupo_produto_id      | integer | O id do grupo de produto                         | Sim          |
| sub_grupo_produto_id  | integer | O id do sub grupo do produto                     | Sim          |
| fornecedor_produto_id | integer | O id do fornecedor do produto                    | Sim          |
| classe_produto_id     | integer | O id da classe do produto                        | Sim          |
| unidade_id            | integer | O id da unidade de medida do produto             | Sim          |
| produto_nome          | string  | O nome do produto                                | Sim          |
| produto_estoque       | numeric | O estoque do produto                             | Sim          |
| produto_preco         | numeric | O preco do produto                               | Sim          |

## Exemplo de requisição

```json
{
    "classe_produto_id": 3,
    "empresa_id": 1,
    "fabricante_produto_id": 7,
    "grupo_produto_id": 3,
    "produto_estoque": "100",
    "produto_nome": "TÊNIS NIKE AIR FORCE 1 SHADOW FEMININO",
    "produto_preco": "899.99",
    "sub_grupo_produto_id": 3,
    "unidade_id": 6
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                      |
|-----------|--------|--------------------------------|
| mensagem  | string | Produto atualizado com sucesso |

## Exemplo de resposta

```json
{
    "mensagem": "Produto atualizado com sucesso"
}
```

## Possibilidade de erro

| Código | Resposta                                                                                          | Motivo                                                                                  |
|--------|---------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                                                   | Quando não for encaminhado algum dado que é obrigatório                                 |
| 422    | O campo deve receber apenas valores string.                                                       | Ao tentar inserir qualquer dado que não seja string                                     |
| 422    | O campo deve receber apenas inteiros.                                                             | Ao tentar inserir qualquer dado que não seja inteiro                                    |
| 422    | O campo deve receber apenas valores númericos (inteiros ou decimais).                             | Ao tentar inserir qualquer dado que não seja númerico                                   |
| 422    | O id não existe na tabela empresas.                                                               | Ao encaminhar um id que não existe na tabela de empresas                                |
| 422    | O id não existe na tabela grupo_produtos.                                                         | Ao encaminhar um id que não existe na tabela de grupo_produtos                          |
| 422    | O id não existe na tabela sub_grupo_produtos.                                                     | Ao encaminhar um id que não existe na tabela de sub_grupo_produtos                      |
| 422    | O id não existe na tabela fornecedor_produto.                                                     | Ao encaminhar um id que não existe na tabela de fornecedor_produto                      |
| 422    | O id não existe na tabela classe_produto.                                                         | Ao encaminhar um id que não existe na tabela de classe_produto                          |
| 422    | O id não existe na tabela unidades.                                                               | Ao encaminhar um id que não existe na tabela de unidades                                |
| 422    | Esse campo tem que conter no máximo 155 caracteres.                                               | Ao encaminhar mais de 155 caracteres                                                    |
| 404    | O produto não existe                                                                              | Ao tentar atualizar um produto que não existe                                           |
| 400    | O produto informado não existe na empresa passada como parametro, entre em contato com o suporte. | Se por algum motivo os dados de empresa_id que são encaminhados 2x não forem os mesmos" |
