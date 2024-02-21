<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentonormativaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Documento normativo',
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => [
                'id' => (string) $this->resource->getRouteKey(),
                'nombre' => $this->nombre,
                'fecha' => $this->fecha,
                'descripcion' => $this->descripcion,
                'archivo' => $this->archivo,
                'updated_at' => $this->updated_at,
                'created_at' => $this->created_at,
                'Tipodedocumento' => $this->Tipodedocumento,
            ],
            'links' => [
                'self' => url('api/v1/documentonormativa', $this->resource)
            ]
        ];
    }
}
