<?php

namespace App\Http\Requests\Cliente;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class CadastroClienteRequest extends FormRequest
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
            'endereco_id' => 'required|integer|exists:enderecos,endereco_id',
            'cliente_nome' => 'required|string|max:255',
            'cliente_email' => 'required|email|max:255',
            'cliente_senha' => 'required|string|max:255',
            'cliente_cpf' => 'required|string|max:11',
            'cliente_telefone' => 'string|max:20',
            'cliente_telefone_contato' =>'required|string|max:20'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'string' => RequestPadroes::$string,
            'integer' => RequestPadroes::$integer,
            'email' => RequestPadroes::$email,
            'max:255' => RequestPadroes::mensagemMax(255),
            'max:20' => RequestPadroes::mensagemMax(20),
            'max:11' => RequestPadroes::mensagemMax(11),
            'endereco_id.exists' => RequestPadroes::mensagemExists('enderecos')
        ];
    }
}
