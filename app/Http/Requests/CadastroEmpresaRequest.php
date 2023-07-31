<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroEmpresaRequest extends FormRequest
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
            'empresa_nome' => 'string|max:255|required',
            'empresa_cnpj' => 'string|max:14|required',
            'empresa_descricao' => 'string|required',
            'empresa_logo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'string' => RequestPadroes::$string,
            'required' => RequestPadroes::$required,
            'empresa_nome.max' => RequestPadroes::mensagemMax(255),
            'empresa_cnpj.max' => RequestPadroes::mensagemMax(14),
            'empresa_logo.max' => RequestPadroes::mensagemMax(2048),
            'empresa_logo.mimes' => RequestPadroes::mensagemMimes(['png', 'jpg', 'jpeg'])
        ];
    }
}
