<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentonormativaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => url('api/v1/documentonormativa'),
                'pagination' => [
                    'current_page' => $this->currentPage(),
                    'from' => $this->firstItem(),
                    'to' => $this->lastItem(),
                    'total' => $this->total(),
                    'per_page' => $this->perPage(),
                    'prev_page' => $this->previousPageUrl(),
                    'next_page' => $this->nextPageUrl(),
                    'last_page' => $this->lastPage(),
                ]
            ],
           
        ];
    }
}
