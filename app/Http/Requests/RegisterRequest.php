<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','min:2'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','confirmed', Password::min(8)->letters()->numbers()->symbols()]
        ];
    }

    public function messages()
    {
        return [
            'name' => 'El nombre es obligatorio',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo no es válido',
            'email.unique' => 'El correo ya se encuentra registrado',
            'password' => 'La contraseña debe tener al menos 8 coracteres, una letra, un símbolo y un número',

        ];
    }
}
