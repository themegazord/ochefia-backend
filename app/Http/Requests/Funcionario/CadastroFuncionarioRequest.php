<?php

namespace App\Http\Requests\Funcionario;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class CadastroFuncionarioRequest extends FormRequest
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
            'endereco_id' => 'integer|exists:enderecos,endereco_id',
            'funcionario_nome' => 'required|string|max:155',
            'funcionario_email' => 'required|email|max:255',
            'funcionario_senha' => 'required|string|max:255',
            'cargo' => 'required|string|max:50',
            'acessos' => 'required|array'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'integer' => RequestPadroes::$integer,
            'string' => RequestPadroes::$string,
            'array' => RequestPadroes::$array,
            'email' => RequestPadroes::$email,
            'max:255' => RequestPadroes::mensagemMax(255),
            'max:155' => RequestPadroes::mensagemMax(155),
            'max:50' => RequestPadroes::mensagemMax(50),
            'empresa_id.exists' => RequestPadroes::mensagemExists('empresas'),
            'endereco_id.exists' => RequestPadroes::mensagemExists('enderecos')
        ];
    }
}
