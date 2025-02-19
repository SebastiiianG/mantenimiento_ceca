<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CgKindPersonRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kind_person' => [
                'required', // El campo es obligatorio
                'string', // Debe ser una cadena de texto
                'max:30', // No puede tener más de 30 caracteres
                Rule::unique(table: 'cg_kind_people', column: 'object') // Debe ser único en la tabla cg_kind_people
                    ->ignore(id: request('cgKindPerson'), idColumn: 'id'), // Ignora el ID actual en caso de edición
            ],
        ];
    }

    /**
     * Mensajes personalizados para las reglas de validación.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // Mensaje personalizado si el tipo de persona ya existe en la base de datos
            'kind_person.unique' => __('El tipo de persona ya existe'),

            // Mensaje personalizado si el nombre supera los 30 caracteres
            'kind_person.max' => __('El tipo de persona no puede superar los 30 caracteres.')
        ];
    }
}
