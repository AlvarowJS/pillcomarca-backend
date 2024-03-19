<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HardwareResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'procesador' => $this->procesador,
            'ram' => $this->ram,
            'almacenamiento' => $this->almacenamiento,
            'tipo_alma' => $this->tipo_alma,
            'ip' => $this->ip,
            'marca' => $this->marca,
            'especif' => $this->especif,
            'cod_patri' => $this->cod_patri,
            'user_id' => $this->user_id,
            // Incluye los datos de la relación con la tabla 'dependencias'
            'dependencia' => [
                'id' => $this->dependencia->id,
                'nombre_dependencia' => $this->dependencia->nombre_dependencia,
                // Agrega aquí todos los campos de la dependencia que deseas incluir en la respuesta JSON
            ],
            // Incluye los datos de la relación con la tabla 'tipos'
            'tipo' => [
                'id' => $this->tipo->id,
                'nombre' => $this->tipo->nombre,
                // Agrega aquí todos los campos de la tabla 'tipos' que deseas incluir en la respuesta JSON
            ],
            // Agrega aquí cualquier otro dato que desees incluir en la respuesta JSON
        ];
    }
}
