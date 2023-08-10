<?php

namespace App\Http\Requests\Financeiro\PrazoPgto;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class CadastroPrazoPgtoRequest extends FormRequest
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
            'prazopgto_nome' => 'required|string|max:50',
            'prazopgto_tipo' => 'required|string|max:30',
            'prazopgto_tipoforma' => 'required|string|max:155'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => RequestPadroes::$required,
            'string' => RequestPadroes::$string,
            'prazopgto_nome.max' => RequestPadroes::mensagemMax(50),
            'prazopgto_tipo.max' => RequestPadroes::mensagemMax(30),
            'prazopgto_tipoforma.max' => RequestPadroes::mensagemMax(155)
        ];
    }
}
