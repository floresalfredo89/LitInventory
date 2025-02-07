<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserBookRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'book_id' => 'required|numeric',
            'acquired_at' => 'nullable|date',
            'buy_price' => 'nullable|numeric|max:999999'
        ];
    }

    public function messages()
    {
        return [
            'user_id' => 'El id del usuario es obligatorio y debe ser número',
            'book_id' => 'El id del libro es obligatorio y debe ser número',
            'acquired_at' => 'La fecha de adquisición o compra, debe ser de tipo fecha (YYYY-MM-DD)',
            'buy_price' => 'El precio de compra debe ser solo números'
        ];
    }
}
