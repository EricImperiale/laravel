<?php

namespace App\Http\Requests\Contratos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $currentDate = now()->format('Y-m-d');
        $propietario_fk_id = request()->propietario_fk_id;

        return [
            'propietario_fk_id' => 'required|exists:propietarios,propietario_id',
            'inquilino_fk_id' => 'required|exists:inquilinos,inquilino_id|different:propietario_fk_id',
            'propiedad_fk_id' => [
                'required',
                'exists:propiedades,propiedad_id',
                // Laravel que ignore el propiedad_fk_id del contrato que estás editando para que no lo considere como un duplicado
                Rule::unique('contratos')->ignore($propietario_fk_id, 'propietario_fk_id'),
            ],
            'fecha_de_comienzo' => 'required|date|after_or_equal:' . $currentDate,
            'fecha_de_final' => 'required|date|after:fecha_de_comienzo',
            'precio_del_alquiler' => 'required|numeric|min:0',
            'fecha_de_vencimiento' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'propietario_fk_id.required' => 'Tenés que seleccionar un Propietario.',
            'propietario_fk_id.exists' => 'El Propietario seleccionado no es válido.',
            'inquilino_fk_id.required' => 'Tenés que seleccionar un Inquilino.',
            'inquilino_fk_id.exists' => 'El Inquilino seleccionado no es válido.',
            'inquilino_fk_id.different' => 'El Propietario y el Inquilino no pueden ser la misma persona.',
            'propiedad_fk_id.required' => 'El campo Propiedad es obligatorio.',
            'propiedad_fk_id.exists' => 'La Propiedad seleccionada no es válida.',
            'propiedad_fk_id.unique' => 'Está propiedad ya tiene un contrato activo.',
            'fecha_de_comienzo.required' => 'El campo Fecha de Comienzo es obligatorio.',
            'fecha_de_comienzo.date' => 'El campo Fecha de Comienzo debe ser una fecha válida.',
            'fecha_de_comienzo.after_or_equal' => 'El campo Fecha de Comienzo no puede ser anterior a la fecha actual.',
            'fecha_de_final.required' => 'El campo Fin del Contrato es obligatorio.',
            'fecha_de_final.date' => 'El campo Fin del Contrato debe ser una fecha válida.',
            'fecha_de_final.after' => 'El campo Fin del Contrato debe ser una fecha posterior a la Fecha de Comienzo.',
            'precio_del_alquiler.required' => 'El campo Precio del Alquiler es obligatorio.',
            'precio_del_alquiler.numeric' => 'El campo Precio del Alquiler debe ser un número.',
            'precio_del_alquiler.min' => 'El campo Precio del Alquiler debe ser mayor o igual a 0.',
            'fecha_de_vencimiento.required' => 'El campo Fecha de Vencimiento es obligatorio.',
            'fecha_de_vencimiento.numeric' => 'El campo Fecha de Vencimiento debe ser un número.',
        ];
    }
}
