<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookLanguageRequest extends FormRequest
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
            'name' => 'required|max:250|unique:book_languages,name'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del lenguaje del libro es obligatorio',
            'name.unique' => 'Este nombre de lenguaje del libro ya existe',
            'name.max' => 'El nombre del lenguaje del libro no debe ser de más de 250 caracteres'
        ];
    }
}
