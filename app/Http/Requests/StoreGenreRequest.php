<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGenreRequest extends FormRequest
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
            'name' => 'required|unique:genres,name|max:250'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del género es obligatorio',
            'name.unique' => 'Este nombre de género ya existe',
            'name.max' => 'El nombre del género no debe ser de más de 250 caracteres',
        ];
    }
}
