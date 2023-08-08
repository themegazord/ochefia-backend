# Cadastro de produtos ![Static Badge](https://img.shields.io/badge/Rota_autenticada-49CC90)

## Explicação de Rotas

Rota usada para cadastrar produtos dentro do sistema

## URL

![Static Badge](https://img.shields.io/badge/POST-%2Fapi%2Fv1%2Fproduto%2Fcadastro-%2349CC90)

## Parametro de requisição

| Parametro             | Tipo    | Descrição                                        | Obrigatório? |
|-----------------------|---------|--------------------------------------------------|--------------|
| empresa_id            | integer | O id da empresa que o produto vai ser cadastrado | Sim          |
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
    "empresa_id": 1,
    "grupo_produto_id": 1,
    "sub_grupo_produto_id": 1,
    "fornecedor_produto_id": 1,
    "classe_produto_id": 1,
    "unidade_id": 1,
    "produto_nome": "Produto teste",
    "produto_estoque": 10,
    "produto_preco": 5.50
}
```

## Parametro de resposta

| Parametro | Tipo   | Descrição                      |
|-----------|--------|--------------------------------|
| mensagem  | string | Produto cadastrado com sucesso |
| produto   | object | Produto cadastrado.            |

## Exemplo de resposta

```json
{
    "mensagem": "Produto cadastrado com sucesso",
    "produto": {
        "empresa_id": 1,
        "grupo_produto_id": 1,
        "sub_grupo_produto_id": 1,
        "fornecedor_produto_id": 1,
        "classe_produto_id": 1,
        "unidade_id": 1,
        "produto_nome": "Produto teste",
        "produto_estoque": 10,
        "produto_preco": 5.5,
        "updated_at": "2023-08-08T19:59:23.000000Z",
        "created_at": "2023-08-08T19:59:23.000000Z",
        "id": 5
    }
}
```

## Possibilidade de erro

| Código | Resposta                                                              | Motivo                                                             |
|--------|-----------------------------------------------------------------------|--------------------------------------------------------------------|
| 422    | Esse campo é obrigatório, por favor, informe-o.                       | Quando não for encaminhado algum dado que é obrigatório            |
| 422    | O campo deve receber apenas valores string.                           | Ao tentar inserir qualquer dado que não seja string                |
| 422    | O campo deve receber apenas inteiros.                                 | Ao tentar inserir qualquer dado que não seja inteiro               |
| 422    | O campo deve receber apenas valores númericos (inteiros ou decimais). | Ao tentar inserir qualquer dado que não seja númerico              |
| 422    | O id não existe na tabela empresas.                                   | Ao encaminhar um id que não existe na tabela de empresas           |
| 422    | O id não existe na tabela grupo_produtos.                             | Ao encaminhar um id que não existe na tabela de grupo_produtos     |
| 422    | O id não existe na tabela sub_grupo_produtos.                         | Ao encaminhar um id que não existe na tabela de sub_grupo_produtos |
| 422    | O id não existe na tabela fornecedor_produto.                         | Ao encaminhar um id que não existe na tabela de fornecedor_produto |
| 422    | O id não existe na tabela classe_produto.                             | Ao encaminhar um id que não existe na tabela de classe_produto     |
| 422    | O id não existe na tabela unidades.                                   | Ao encaminhar um id que não existe na tabela de unidades           |
| 422    | Esse campo tem que conter no máximo 155 caracteres.                   | Ao encaminhar mais de 155 caracteres                               |
