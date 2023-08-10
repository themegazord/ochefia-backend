<?php

namespace App\Http\Requests\Estoque\Produto;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class CadastroProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'empresa_id' => 'required|integer|exists:empresas,empresa_id',
            'grupo_produto_id' => 'required|integer|exists:grupo_produtos,grupo_produto_id',
            'sub_grupo_produto_id' => 'required|integer|exists:sub_grupo_produtos,sub_grupo_produto_id',
            'fornecedor_produto_id' => 'required|integer|exists:fornecedor_produto,fornecedor_produto_id',
            'classe_produto_id' => 'required|integer|exists:classe_produto,classe_produto_id',
            'unidade_id' => 'required|integer|exists:unidades,unidade_id',
            'produto_nome' => 'required|string|max:155',
            'produto_estoque' => 'required|numeric',
            'produto_preco' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'string' => RequestPadroes::$string,
            'integer' => RequestPadroes::$integer,
            'numeric' => RequestPadroes::$numeric,
            'empresa_id.exists' => RequestPadroes::mensagemExists('empresas'),
            'grupo_produto_id.exists' => RequestPadroes::mensagemExists('grupo_produtos'),
            'sub_grupo_produto_id.exists' => RequestPadroes::mensagemExists('sub_grupo_produtos'),
            'fornecedor_produto_id.exists' => RequestPadroes::mensagemExists('fornecedor_produto'),
            'classe_produto_id.exists' => RequestPadroes::mensagemExists('classe_produto'),
            'unidade_id.exists' => RequestPadroes::mensagemExists('unidades'),
            'produto_nome.max' => RequestPadroes::mensagemMax(155)
        ];
    }
}
