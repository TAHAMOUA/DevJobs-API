<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOffreRequest;
use App\Http\Requests\UpdateOffreRequest;
use App\Http\Resources\OffreResource;
use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Afficher toutes les offres de l'entreprise connectée
     */
    public function index(Request $request)
    {
        $entreprise = $request->user()->entreprise;

        if (!$entreprise) {
            return response()->json([
                'message' => 'Profil entreprise introuvable.'
            ], 404);
        }

        $offres = $entreprise->offres()->latest()->get();

        return OffreResource::collection($offres);
    }

    /**
     * Créer une offre
     */
    public function store(StoreOffreRequest $request)
    {
        $entreprise = $request->user()->entreprise;

        if (!$entreprise) {
            return response()->json([
                'message' => 'Profil entreprise introuvable.'
            ], 404);
        }

        $offre = Offre::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'type_contrat' => $request->type_contrat,
            'entreprise_id' => $entreprise->id,
        ]);

        return response()->json([
            'message' => 'Offre créée avec succès.',
            'offre' => new OffreResource($offre),
        ], 201);
    }

   /**
 * Afficher une offre de l'entreprise connectée
 */
public function show(Request $request, int $id)
{
    $entreprise = $request->user()->entreprise;

    if (!$entreprise) {
        return response()->json([
            'message' => 'Profil entreprise introuvable.'
        ], 404);
    }

    $offre = $entreprise->offres()->find($id);

    if (!$offre) {
        return response()->json([
            'message' => 'Offre introuvable.'
        ], 404);
    }

    return new OffreResource($offre);
}
   /**
 * Modifier une offre
 */
public function update(UpdateOffreRequest $request, int $id)
{
    $entreprise = $request->user()->entreprise;

    if (!$entreprise) {
        return response()->json([
            'message' => 'Profil entreprise introuvable.'
        ], 404);
    }

    $offre = $entreprise->offres()->find($id);

    if (!$offre) {
        return response()->json([
            'message' => 'Offre introuvable.'
        ], 404);
    }

    $offre->update($request->validated());

    return response()->json([
        'message' => 'Offre mise à jour avec succès.',
        'offre' => new OffreResource($offre),
    ]);
}
    /**
     * Supprimer une offre
     */
    public function destroy(Request $request, Offre $offre)
    {
        if ($offre->entreprise_id !== $request->user()->entreprise->id) {
            return response()->json([
                'message' => 'Accès refusé.'
            ], 403);
        }

        $offre->delete();

        return response()->json([
            'message' => 'Offre supprimée avec succès.'
        ]);
    }
}