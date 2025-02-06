<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookTypeRequest extends FormRequest
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
            'name' => 'required|max:250|unique:book_types,name,'.$this->book_type->id
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del tipo de libro es obligatorio',
            'name.unique' => 'Este nombre de tipo de libro ya existe',
            'name.max' => 'El nombre del tipo de libro no debe ser de más de 250 caracteres',
        ];
    }
}
