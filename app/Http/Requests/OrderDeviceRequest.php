<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderDeviceRequest extends FormRequest
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
            //
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
            'devices.*.order_id' => 'nullable|string',
            'devices.*.cg_kind_failure_id' => 'required|integer',
            'devices.*.cg_kind_object_id' => 'required|integer',
            'devices.*.ceca_repairs' => 'nullable|integer',

        ];
    }

    public function messages(): array
    {
        return [
            'devices.*.model.required'=> __('El modelo es requerido'),
            'devices.*.model.string'=>'El modelo debe ser de tipo texto',
            'devices.*.model.max'=>'El modelo no puede tener mas de 30 caracteres',
            'devices.*.client_observations.required'=>'Las observaciones del cliente son requeridas',
            'devices.*.client_observations.string'=>'Las observaciones del cliente deben ser un texto',
            'devices.*.diagnostic.string'=>'El diagnostico debe ser texto',
            'devices.*.ceca_observations.string'=>'Las observaciones de Ceca deben ser texto',
            'devices.*.status.required'=>'El status es requerido',
            'devices.*.status.string'=>'El status debe ser un string',
            'devices.*.status.in'=>'El status debe ser uno de los siguientes: Sin asignar, En proceso',
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
