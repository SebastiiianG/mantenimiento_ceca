<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CgDependencyRequest extends FormRequest
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
            'dependency_name' => [
                'required',
                'string',
                'max:150',
                Rule::unique(table: 'cg_dependencies', column: 'dependency_name')->ignore(id: request('cgDependency'), idColumn: 'id'),
            ],

        ];
    }

    public function messages(): array
    {
        return [
            //Devuelve un mensaje personalizado
            'dependency_name.unique' => __('La dependencia universitaria ya existe'),
            'dependency_name.max' => __('El nombre de la dependencia no puede superar los 150 caracteres.')


        ];
    }
}
