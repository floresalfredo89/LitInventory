<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
            'name' => 'required|max:250|unique:authors,name,'.$this->author->id,
            'bio' => 'nullable|max:5000',
            'nationality' => 'nullable|max:250'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del autor es obligatorio',
            'name.unique' => 'Este nombre de autor ya existe',
            'name.max' => 'El nombre del autor no debe ser de más de 250 caracteres',
            'bio' => 'La biografía del autor no debe ser de más de 5000 caracteres',
            'nationality' => 'La nacionalidad del autor no debe ser de más de 250 caracteres'
        ];
    }
}
