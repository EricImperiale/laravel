<?php

namespace App\Http\Requests\Propiedades;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
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
        return [
            'direccion' => 'required|string|max:255',
            'altura' => 'required|integer|min:1',
            'ciudad' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'barrio' => 'required|string|max:255',
            'codigo_postal' => 'required',
            'area_total' => 'required|integer',
            'area_cubierta' => 'required|integer|min:1',
            'descripcion' => 'nullable|string',
            'precio_del_alquiler' => 'required|integer|min:1',
            'expensas' => 'nullable|integer|min:0|required_if:tdp_fk_id,2',
            'piso' => 'nullable|integer|min:0|required_if:tdp_fk_id,2',
            'numero_de_departamento' => 'nullable|min:0|required_if:tdp_fk_id,2',
            'ambientes' => 'required|integer|min:1',
            'cuartos' => 'required|integer|min:1',
            'banios' => 'required|integer|min:1',
            'tdp_fk_id' => 'required',
            'propietario_fk_id' => 'required|exists:propietarios,propietario_id',
            'estado_fk_id' => 'required|exists:estado_de_propiedades,estado_id',
            'direccion_altura' => 'unique:propiedades,direccion,altura',
        ];
    }

    public function messages(): array
    {
        return [
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string' => 'La dirección debe ser una cadena de texto.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',
            'altura.required' => 'La altura es obligatoria.',
            'altura.integer' => 'La altura debe ser un número entero.',
            'altura.min' => 'La altura debe ser al menos 1.',
            'ciudad.required' => 'La ciudad es obligatoria.',
            'ciudad.string' => 'La ciudad debe ser una cadena de texto.',
            'ciudad.max' => 'La ciudad no puede tener más de 255 caracteres.',
            'provincia.required' => 'La provincia es obligatoria.',
            'provincia.string' => 'La provincia debe ser una cadena de texto.',
            'provincia.max' => 'La provincia no puede tener más de 255 caracteres.',
            'barrio.required' => 'El barrio es obligatorio.',
            'barrio.string' => 'El barrio debe ser una cadena de texto.',
            'barrio.max' => 'El barrio no puede tener más de 255 caracteres.',
            'codigo_postal.required' => 'El código postal es obligatorio.',
            'codigo_postal.integer' => 'El código postal debe ser un número entero.',
            'codigo_postal.min' => 'El código postal debe ser al menos 1000.',
            'codigo_postal.max' => 'El código postal no puede ser mayor a 9999.',
            'area_total.required' => 'El área total es obligatoria.',
            'area_total.integer' => 'El área total debe ser un número entero.',
            'area_total.min' => 'El área total debe ser al menos 1.',
            'area_cubierta.required' => 'El área cubierta es obligatoria.',
            'area_cubierta.integer' => 'El área cubierta debe ser un número entero.',
            'area_cubierta.min' => 'El área cubierta debe ser al menos 1.',
            'area_cubierta.max' => 'El área cubierta no puede ser mayor que el área total.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'precio_del_alquiler.required' => 'El precio del alquiler es obligatorio.',
            'precio_del_alquiler.integer' => 'El precio del alquiler debe ser un número entero.',
            'precio_del_alquiler.min' => 'El precio del alquiler debe ser al menos 1.',
            'expensas.integer' => 'Las expensas deben ser un número entero.',
            'expensas.min' => 'Las expensas no pueden ser menores a 0.',
            'expensas.required_if' => 'Las expensas son obligatorias si el tipo de propiedad es departamento.',
            'piso.integer' => 'El piso debe ser un número entero.',
            'piso.min' => 'El piso no puede ser menor a 0.',
            'piso.required_if' => 'El piso es obligatorio si el tipo de propiedad es un departamento.',
            'numero_de_departamento.integer' => 'El número de departamento debe ser un número entero.',
            'numero_de_departamento.min' => 'El número de departamento no puede ser menor a 0.',
            'numero_de_departamento.required_if' => 'El número de departamento es obligatorio si el tipo de propiedad es departamento.',
            //'es_uso_profesional.boolean' => 'El campo de uso profesional debe ser verdadero o falso.',
            'ambientes.required' => 'La cantidad de ambientes es obligatoria.',
            'ambientes.integer' => 'La cantidad de ambientes debe ser un número entero.',
            'ambientes.min' => 'La cantidad de ambientes debe ser al menos 1.',
            'cuartos.required' => 'La cantidad de cuartos es obligatoria.',
            'cuartos.integer' => 'La cantidad de cuartos debe ser un número entero.',
            'cuartos.min' => 'La cantidad de cuartos debe ser al menos 1.',
            'banios.required' => 'La cantidad de baños es obligatoria.',
            'banios.integer' => 'La cantidad de baños debe ser un número entero.',
            'banios.min' => 'La cantidad de baños debe ser al menos 1.',
            'tdp_fk_id.required' => 'El tipo de propiedad es obligatorio.',
            'propietario_fk_id.required' => 'El propietario es obligatorio.',
            'propietario_fk_id.exists' => 'El propietario seleccionado no es valido.',
            'estado_fk_id.required' => 'El estado de la propiedad es obligatorio.',
            'estado_fk_id.exists' => 'El estado de la propiedad no es valido.',
            'direccion_altura.unique' => 'La combinación de dirección y altura ya existe.',
        ];
    }
}
