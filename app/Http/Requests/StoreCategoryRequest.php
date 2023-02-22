<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'label' => 'required|string|max:50',
            'icon' => 'nullable|string|max:20',
            'background_color' => 'nullable|string|max:10',
            'font_color' => 'nullable|string|max:10',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório!',            
            'name.max' => 'O nome é maior que :max caracteres.',
            'label.required' => 'O rótulo é obrigatório!',
            'label.max' => 'O rótulo é maior que :max caracteres.',
            'icon.max' => 'O icone é maior que :max caracteres.',
            'background_color.max' => 'A cor de fundo é maior que :max caracteres.',
            'font_color.max' => 'A cor da fonte rótulo é maior que :max caracteres.',
        ];
    }
}
