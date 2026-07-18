<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidatureRequest;
use App\Http\Resources\CandidatureResource;
use App\Models\Candidature;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    /**
     * Créer une candidature
     */
    public function store(StoreCandidatureRequest $request)
    {
        $user = $request->user();

        if ($user->role !== 'candidat') {
            return response()->json([
                'message' => 'Accès refusé.'
            ], 403);
        }

        $exists = Candidature::where('user_id', $user->id)
            ->where('offre_id', $request->offre_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Vous avez déjà postulé à cette offre.'
            ], 409);
        }

        $candidature = Candidature::create([
            'statut' => 'En attente',
            'date_candidature' => now(),
            'user_id' => $user->id,
            'offre_id' => $request->offre_id,
        ]);

        return response()->json([
            'message' => 'Candidature envoyée avec succès.',
            'candidature' => new CandidatureResource($candidature),
        ], 201);
    }
}