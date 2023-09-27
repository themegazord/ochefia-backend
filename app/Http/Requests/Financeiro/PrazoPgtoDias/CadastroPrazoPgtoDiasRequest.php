<?php

namespace App\Http\Requests\Financeiro\PrazoPgtoDias;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class CadastroPrazoPgtoDiasRequest extends FormRequest
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
            'parcelas' => 'required|array',
            'parcelas.*.empresa_id' => 'integer|required|exists:empresas,empresa_id',
            'parcelas.*.prazopgto_id' => 'integer|required|exists:prazo_pgto,prazopgto_id',
            'parcelas.*.dias' => 'integer|required'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'array' => RequestPadroes::$array,
            'integer' => RequestPadroes::$integer,
            'parcelas.*.prazopgto_id.exists' => RequestPadroes::mensagemExists('prazo de pagamentos'),
            'parcelas.*.empresa_id.exists' => RequestPadroes::mensagemExists('empresa')
        ];
    }
}
