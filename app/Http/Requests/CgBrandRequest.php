<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CgBrandRequest extends FormRequest
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
            'brand_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique(table: 'cg_brands', column: 'brand_name')->ignore(id: request('cgBrand'), idColumn: 'id'),
            ],

        ];
    }

    public function messages(): array
    {
        return [
            //Devuelve un mensaje personalizado
            'brand_name.unique' => __('El nombre de la marca ya existe')
        ];
    }
}
