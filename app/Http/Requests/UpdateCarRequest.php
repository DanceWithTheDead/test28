<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'brand_name' => 'sometimes|string|max:50',
            'model_name' => 'sometimes|string|max:50',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'mileage' => 'nullable|integer|min:0',
            'color' => 'nullable|string|max:50'
        ];
    }

    public function messages()
    {
        return [
            'brand_name.string' => 'Название марки должно быть строкой',
            'brand_name.max' => 'Название марки не должно превышать 50 символов',

            'model_name.string' => 'Название модели должно быть строкой',
            'model_name.max' => 'Название модели не должно превышать 50 символов',

            'year.integer' => 'Год должен быть целым числом',
            'year.min' => 'Год не должен быть меньше 1900',
            'year.max' => 'Год не должен быть больше текущего',

            'mileage.integer' => 'Пробег должен быть числом',
            'mileage.min' => 'Пробег не может быть отрицательным',

            'color.string' => 'Цвет должен быть строкой',
            'color.max' => 'Название цвета не может превышать 50 символов'
        ];
    }
}
