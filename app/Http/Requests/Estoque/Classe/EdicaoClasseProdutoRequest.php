<?php

namespace App\Http\Requests\Estoque\Classe;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class EdicaoClasseProdutoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'classe_produto_nome' => 'required|string|max:50'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'string' => RequestPadroes::$string,
            'classe_produto_nome.max' => RequestPadroes::mensagemMax(50)
        ];
    }
}
