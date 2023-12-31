<?php

namespace App\Http\Requests\Autenticacao;

use App\Http\Requests\RequestPadroes;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'email|required',
            'password' => 'string|required'
        ];
    }

    public function messages(): array
    {
        return [
            'string' => RequestPadroes::$string,
            'email' => RequestPadroes::$email,
            'required' => RequestPadroes::$required,
        ];
    }
}
