<?php

namespace App\Http\Requests\Estoque\Grupo;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class EdicaoGrupoProdutoRequest extends FormRequest
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
            'grupo_produto_nome' => 'required|string|max:30',
            'grupo_produto_tipo' => 'required|string|max:25'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'string' => RequestPadroes::$string,
            'grupo_produto_nome.max' => RequestPadroes::mensagemMax(30),
            'grupo_produto_tipo.max' => RequestPadroes::mensagemMax(25)
        ];
    }
}
