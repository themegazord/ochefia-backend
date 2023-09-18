<?php

namespace App\Http\Requests\Estoque\SubGrupo;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class EdicaoSubGrupoProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sub_grupo_produto_nome' => 'required|string|max:30'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'string' => RequestPadroes::$string,
            'sub_grupo_produto_nome.max' => RequestPadroes::mensagemMax(30)
        ];
    }
}
