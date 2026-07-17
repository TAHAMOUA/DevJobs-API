<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OffreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titre' => $this->titre,
            'description' => $this->description,
            'type_contrat' => $this->type_contrat,
            'entreprise_id' => $this->entreprise_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}