<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CgAcademicAreaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'area_name' => [
                'required',
                'string',
                'max:80',
                Rule::unique(table: 'cg_academic_areas', column: 'area_name')->ignore(id: request('cgAcademicArea'), idColumn: 'id'),
            ],
            'cg_dependency_id' => [
                'required',
                'integer',
                'exists:cg_dependencies,id', // Asegura que la clave foránea existe en la tabla `cg_dependencies`
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'area_name.unique' => __('La dependencia universitaria ya existe'),
            'area_name.max' => __('El nombre de la dependencia no puede superar los 150 caracteres.'),
            'cg_dependency_id.required' => __('La dependencia es obligatoria.'),
            'cg_dependency_id.integer' => __('El ID de la dependencia debe ser un número válido.'),
            'cg_dependency_id.exists' => __('La dependencia seleccionada no es válida.'),
        ];
    }
}
