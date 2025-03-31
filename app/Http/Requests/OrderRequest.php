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
            //reglas para la orden
            'date_generation' => ['date', 'before_or_equal:today'],
            'date_reception' => ['date'],
            'delivery_date' => ['nullable', 'date'],
            'status' => ['required', 'string', 'in:Sin asignar,En proceso,Finalizado'],
            'client_delivered' => ['required', 'string', 'max:50'],
            'client_received' => ['nullable', 'string', 'max:50'],
            'phone_number' => ['nullable', 'string', 'max:10'],
            'ext' => ['nullable', 'string', 'max:15'],
            'cell_number' => ['nullable', 'string', 'max:10'],
            'mail' => ['nullable', 'string', 'email','max:50'],
            'kperson_delivery' => ['required', 'integer', Rule::exists('cg_kind_people', 'id') ],
            'cg_academic_area_id' => ['nullable'],
            'cg_dependency_id' => ['required', 'integer', Rule::exists('cg_dependencies', 'id')],
            'ceca_received' => ['integer', Rule::exists('users', 'id')],
            'ceca_delivered' => ['nullable', 'integer', Rule::exists('users', 'id')],

            //reglas para los dispoisitivos
            'devices' => 'required|array|min:1',
            'devices.*.model' => 'required|string',
            'devices.*.client_observations' => 'required|string',
            'devices.*.diagnostic' => 'nullable|string',
            'devices.*.ceca_observations' => 'nullable|string',
            'devices.*.status' => 'required|string',
            'devices.*.computer' => 'required|integer',
            'devices.*.assigned' => 'required|string',
            'devices.*.serial_number' => 'nullable|string',
            'devices.*.cg_brand_id' => 'required|integer',
            'devices.*.order_id' => 'integer',
            'devices.*.cg_kind_failure_id' => 'required|integer',
            'devices.*.cg_kind_object_id' => 'required|integer',
            'devices.*.ceca_repairs' => 'nullable|integer',
            'devices.*.password' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'date_generation.date' => __('La fecha de generación debe ser válida.'),
            'date_reception.date' => __('La fecha de recepción debe ser válida.'),
            'delivery_date.date' => __('La fecha de entrega debe ser válida.'),
            'client_delivered.required' => __('El nombre del cliente que entrega el/los equipos es obligatorio.'),
            'client_delivered.string' => __('El nombre del cliente que entrega el/los equipos debe ser una cadena de texto.'),
            'client_delivered.max' => __('El nombre del cliente que entrega el/los equipos no puede superar los 50 caracteres.'),
            'client_received.string' => __('El nombre del cliente que recibe el/los equipos debe ser una cadena de texto.'),
            'client_received.max' => __('El nombre del cliente que recibe el/los equipos no puede superar los 50 caracteres.'),
            'phone_number.string' => __('El número de teléfono debe ser una cadena de texto.'),
            'phone_number.number' => __('El número de teléfono debe ser texto numérico.'),
            'phone_number.max' => __('El número de teléfono no puede superar los 10 caracteres.'),
            'ext.int' => __('La extensión debe ser una cadena de texto.'),
            'ext.max' => __('La extensión no puede superar los 15 caracteres.'),
            'cell_number.string' => __('El número de celular debe ser una cadena de texto.'),
            'cell_number.number' => __('El número de celular debe ser texto numérico.'),
            'cell_number.max' => __('El número de celular no puede superar los 10 caracteres.'),
            'mail.string' => __('El correo electrónico debe ser una cadena de texto.'),
            'mail.email' => __('El correo electrónico debe ser válido.'),
            'mail.max' => __('El correo electrónico no puede superar los 50 caracteres.'),
            'kperson_delivery.required' => __('El tipo de persona que entrega los equipos es obligatoria.'),
            'kperson_delivery.integer' => __('La persona que entrega los equipos debe ser un número válido.'),
            'cg_dependency_id.required' => __('La dependencia universitaria es obligatoria. En caso de ser externo elija la dependencia "Externo".'),
            'cg_academic_area_id.required' => __('El área académica es obligatoria. En caso de no tener, seleccione "Sin área académica".'),
            'ceca_received.integer' => __('Debe seleccionar el miembro del área de mantenimiento que recibió los equipos.'),

            //mensajes para dispositivo
            'devices.min '=> __('Debes seleccionar al menos un dispositivo.'),
            'devices.*.model.required'=> __('El modelo es requerido'),
            'devices.*.model.string'=>'El modelo debe ser de tipo texto',
            'devices.*.model.max'=>'El modelo no puede tener mas de 30 caracteres',
            'devices.*.client_observations.required'=>'Las observaciones del cliente son requeridas',
            'devices.*.client_observations.string'=>'Las observaciones del cliente deben ser un texto',
            'devices.*.diagnostic.string'=>'El diagnostico debe ser texto',
            'devices.*.ceca_observations.string'=>'Las observaciones de Ceca deben ser texto',
            'devices.*.status.required'=>'El estado es requerido',
            'devices.*.status.string'=>'El estado debe ser un string',
            'devices.*.status.in'=>'El estado debe ser uno de los siguientes: Sin asignar, En proceso, Finalizado',
            'devices.*.computer.required'=>'Campo requerido',
            'devices.*.serial_number.max'=> 'El numero de serie no puede tener mas de 50 caracteres',
            'devices.*.cg_brand_id.required'=>'El id de la marca es requerido',
            'devices.*.cg_brand_id.integer'=>'El id de la marca debe ser un entero',
            'devices.*.cg_brand_id.exists'=>'El id de la marca no existe',
            'devices.*.cg_kind_failure_id.required'=>'El id del tipo de falla es requerido',
            'devices.*.cg_kind_failure_id.integer'=>'El id del tipo de falla debe ser un número valido',
            'devices.*.cg_kind_failure_id.exists'=>'El id del tipo de falla no existe',
            'devices.*.cg_kind_object_id.required'=>'El id del tipo de objeto es requerido',
            'devices.*.cg_kind_object_id.integer'=>'El id del tipo de objeto debe ser un número valido',
            'devices.*.cg_kind_object_id.exists'=>'El id del tipo de objeto no existe',
            'devices.*.ceca_repairs.integer'=>'El id del reparador de Ceca debe ser un número valido',
            'devices.*.ceca_repairs.exists'=>'El id del reparador de Ceca no existe',
        ];
    }
}
