<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'statut' => $this->statut,
            'date_candidature' => $this->date_candidature,
            'user_id' => $this->user_id,
            'offre_id' => $this->offre_id,
            'created_at' => $this->created_at,
        ];
    }
}