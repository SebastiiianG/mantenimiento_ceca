<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class OrderRequest extends FormRequest
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
            'date_generation' => ['required', 'date'],
            'date_reception' => ['date'],
            'delivery_date' => ['date'],
            'status' => ['required', 'string'],
            'client_deliveries' => ['required', 'string', 'max:50'],
            'client_receives' => ['string', 'max:50'],
            'phone_number' => ['string', 'max:10'],
            'ext' => ['string', 'max:15'],
            'cell_number' => ['string', 'max:10'],
            'mail' => ['string', 'email','max:50'],
            'kperson_delivery' => ['required', 'integer', Rule::exists('cg_kind_people', 'id') ],
            'cg_academic_area_id' => ['required', 'integer', Rule::exists('cg_academic_areas', 'id')],
            'cg_dependency_id' => ['required', 'integer', Rule::exists('cg_dependencies', 'id')],
            'ceca_receives' => ['integer', Rule::exists('users', 'id')],
            'ceca_deliveries' => ['integer', Rule::exists('users', 'id')],
        ];
    }

    public function messages(): array
    {
        return [
            'date_generation.required' => __('La fecha de generación es obligatoria.'),
            'date_generation.date' => __('La fecha de generación debe ser válida.'),
            'date_reception.date' => __('La fecha de recepción debe ser válida.'),
            'delivery_date.date' => __('La fecha de entrega debe ser válida.'),
            'status.required' => __('El estatus es obligatorio.'),
            'status.string' => __('El estatus debe ser una cadena de texto.'),
            'client_deliveries.required' => __('El nombre del cliente que entrega el/los equipos es obligatorio.'),
            'client_deliveries.string' => __('El nombre del cliente que entrega el/los equipos debe ser una cadena de texto.'),
            'client_deliveries.max' => __('El nombre del cliente que entrega el/los equipos no puede superar los 50 caracteres.'),
            'client_receives.string' => __('El nombre del cliente que recibe el/los equipos debe ser una cadena de texto.'),
            'client_receives.max' => __('El nombre del cliente que recibe el/los equipos no puede superar los 50 caracteres.'),
            'phone_number.string' => __('El número de teléfono debe ser una cadena de texto.'),
            'phone_number.max' => __('El número de teléfono no puede superar los 10 caracteres.'),
            'ext.string' => __('La extensión debe ser una cadena de texto.'),
            'ext.max' => __('La extensión no puede superar los 15 caracteres.'),
            'cell_number.string' => __('El número de celular debe ser una cadena de texto.'),
            'cell_number.max' => __('El número de celular no puede superar los 10 caracteres.'),
            'mail.string' => __('El correo electrónico debe ser una cadena de texto.'),
            'mail.email' => __('El correo electrónico debe ser válido.'),
            'mail.max' => __('El correo electrónico no puede superar los 50 caracteres.'),
            'kperson_delivery.required' => __('La persona que entrega los equipos es obligatoria.'),
            'kperson_delivery.integer' => __('La persona que entrega los equipos debe ser un número válido.'),
            'cg_dependency_id.required' => __('El área académica es obligatoria. En caso de ser externo elija la dependencia "Externo".'),
        ];
    }
}
