<?php

namespace App\Http\Requests\Endereco;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class CadastroEnderecoRequest extends FormRequest
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
            'endereco_rua' => 'required|string|max:255',
            'endereco_numero' => 'required|integer',
            'endereco_complemento' => 'string|max:155',
            'endereco_cep' => 'required|string|max:8',
            'endereco_bairro' => 'required|string|max:50',
            'endereco_cidade' => 'required|string|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'string' => RequestPadroes::$string,
            'integer' => RequestPadroes::$integer,
            'max:255' => RequestPadroes::mensagemMax(255),
            'max:100' => RequestPadroes::mensagemMax(100),
            'max:50' => RequestPadroes::mensagemMax(50),
            'max:8' => RequestPadroes::mensagemMax(8),
        ];
    }
}
