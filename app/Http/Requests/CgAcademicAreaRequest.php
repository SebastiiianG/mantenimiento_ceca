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
        return true;
    }
    protected function failedAuthorization()
    {
        throw new \Illuminate\Auth\Access\AuthorizationException('No tienes los permisos necesarios para realizar esta acción.');
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
                'max:150',
                Rule::unique(table: 'cg_academic_areas', column: 'area_name')->ignore(id: request('cgAcademicArea'), idColumn: 'id'),
            ],
            'cg_dependency_id' => [
                'required',
                'integer',
                Rule::exists('cg_dependencies', 'id')// Asegura que la clave foránea existe en la tabla `cg_dependencies`
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'area_name.unique' => __('El área académica ya existe'),
            'area_name.max' => __('El nombre del área académica no puede superar los 150 caracteres.'),
            'area_name.required' => __('El nombre del área académica es obligatorio.'),
            'cg_dependency_id.required' => __('La dependencia es obligatoria.'),
            'cg_dependency_id.integer' => __('El ID de la dependencia debe ser un número válido.'),
            'cg_dependency_id.exists' => __('La dependencia seleccionada no es válida.'),
        ];
    }
}
