<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CgKindFailureRequest extends FormRequest
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
            'failure' => [
                'required',
                'string',
                'max:80',
                Rule::unique(table: 'cg_kind_failures', column: 'failure')->ignore(id: request('cgKindFailure'), idColumn: 'id'),
            ],

        ];
    }

    public function messages(): array
    {
        return [
            //Devuelve un mensaje personalizado
            'failure.unique' => __('El tipo de falla ya existe'),
            'failure.max' => __('El nombre de la falla no puede superar los 80 caracteres.')

        ];
    }
}
