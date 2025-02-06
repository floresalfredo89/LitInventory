<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'language_id' => 'required|numeric',
            'format_id' => 'required|numeric',
            'type_id' => 'required|numeric',
            'isbn' => 'required|numeric|max_digits:13|min_digits:1',
            'title' => 'required|max:250',
            'cover_url' => 'nullable|max:250',
            'publication_year' => 'nullable|numeric|max:9999|min:0',
            'page_count' => 'nullable|numeric|max:9999|min:1',
            'height' => 'nullable|numeric|max:999|min:0',
            'width' => 'nullable|numeric|max:999|min:0'
        ];
    }

    public function messages()
    {
        return [
            'language_id' => 'El id del lenguaje es obligatorio y debe ser número',
            'format_id' => 'El id del formato es obligatorio y debe ser número',
            'type_id' => 'El id del tipo es obligatorio y debe ser número',
            'isbn.required' => 'El ISBN es obligatorio',
            'isbn.numeric' => 'El ISBN debe ser solo de números',
            'isbn.max_digits' => 'El ISBN debe tener un máximo de 13 digitos',
            'title.required' => 'El título del libro es obligatorio',
            'title.max' => 'El título del libro debe ser de máximo 250 caracteres',
            'cover_url' => 'El url de la tapa del libro debe ser de máximo 250 caracteres',
            'publication_year.numeric' => 'El año de publicación debe ser solo de tipo número',
            'publication_year.max' => 'El año de publicación no debe ser más de 9999',
            'publication_year.min' => 'El año de publicación debe ser mayor de 1',
            'page_count.numeric' => 'El número de páginas debe ser solo número',
            'page_count.max' => 'El número máximo de páginas que se pueden colocar son 9999',
            'page_count.min' => 'El número mínimo de páginas que se pueden colocar es 1',
            'height.numeric' => 'La altura acepta solo números',
            'height.max' => 'El número máximo de altura es 999',
            'height.min' => 'El número minimo de altura es 0',
            'width.numeric' => 'El ancho acepta solo números',
            'width.max' => 'El número máximo de ancho es 999',
            'width.min' => 'El número minimo de ancho es 0'
        ];
    }
}
