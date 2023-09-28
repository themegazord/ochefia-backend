<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroFormPgtoRequest extends FormRequest
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
            'formapgto_nome' => 'required|string|max:50',
            'formapgto_tipo' => 'required|string|max:30',
            'clientes_id' => 'integer|exists:clientes,clientes_id',
            'prazopgto_id' => 'integer|exists:prazo_pgto,prazopgto_id'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'string' => RequestPadroes::$string,
            'integer' => RequestPadroes::$integer,
            'empresa_id.exists' => RequestPadroes::mensagemExists('empresas'),
            'clientes_id.exists' => RequestPadroes::mensagemExists('clientes'),
            'prazopgto_id.exists' => RequestPadroes::mensagemExists('prazo de pagamento'),
            'formapgto_nome.max' => RequestPadroes::mensagemMax(50),
            'formapgto_tipo.max' => RequestPadroes::mensagemMax(30)
        ];
    }
}
