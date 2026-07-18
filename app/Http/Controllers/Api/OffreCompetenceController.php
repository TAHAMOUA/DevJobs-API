<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SyncOffreCompetenceRequest;
use App\Http\Resources\CompetenceResource;
use App\Models\Offre;
use Illuminate\Http\Request;

class OffreCompetenceController extends Controller
{
    /**
     * Associer des compétences à une offre
     */
    public function sync(SyncOffreCompetenceRequest $request, int $offre)
    {
        $entreprise = $request->user()->entreprise;

        if (!$entreprise) {
            return response()->json([
                'message' => 'Profil entreprise introuvable.'
            ], 404);
        }

        $offre = $entreprise->offres()->find($offre);

        if (!$offre) {
            return response()->json([
                'message' => 'Offre introuvable.'
            ], 404);
        }

        $offre->competences()->sync($request->competences);

        return response()->json([
            'message' => 'Compétences associées avec succès.',
            'competences' => CompetenceResource::collection($offre->competences),
        ]);
    }

    /**
 * Afficher les compétences d'une offre
 */
public function index(Request $request, int $offre)
{
    $entreprise = $request->user()->entreprise;

    if (!$entreprise) {
        return response()->json([
            'message' => 'Profil entreprise introuvable.'
        ], 404);
    }

    $offre = $entreprise->offres()->find($offre);

    if (!$offre) {
        return response()->json([
            'message' => 'Offre introuvable.'
        ], 404);
    }

    return CompetenceResource::collection($offre->competences);
}
}