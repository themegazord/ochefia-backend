<?php

namespace App\Http\Requests\Estoque\Classe;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class CadastroClasseProdutoRequest extends FormRequest
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
