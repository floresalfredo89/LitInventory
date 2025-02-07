<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookNoteRequest extends FormRequest
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
            'summary' => 'required|max:250',
            'page_number' => 'nullable|numeric',
            'note' => 'nullable|max:65000'
        ];
    }

    public function message()
    {
        return [
            'summary.required' => 'Este campo es obligatorio',
            'summary.max' => 'Este no puede tener mas de 255 caracteres',
            'page_number' => 'La página del libro debe ser de tipo número',
            'note' => 'El tamaño máximo del texto que se puede mandar en este campo es de 65,000'
        ];
    }
}
