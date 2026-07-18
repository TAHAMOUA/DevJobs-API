<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Http\Resources\EntrepriseResource;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
 * Afficher toutes les entreprises
 */
public function index()
{
    $entreprises = Entreprise::latest()->get();

    return EntrepriseResource::collection($entreprises);
}

    /**
     * Afficher le profil de l'entreprise connectée
     */
    public function show(Request $request)
    {
        $entreprise = $request->user()->entreprise;

        if (!$entreprise) {
            return response()->json([
                'message' => 'Aucun profil entreprise trouvé.',
                'entreprise' =>$entreprise,
            ], 404);
        }

        return new EntrepriseResource($entreprise);
    }

    /**
     * Créer un profil entreprise
     */
    public function store(StoreEntrepriseRequest $request)
    {
        $user = $request->user();

        if ($user->entreprise) {
            return response()->json([
                'message' => 'Vous avez déjà un profil entreprise.'
            ], 409);
        }

        $entreprise = Entreprise::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'logo' => $request->logo,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'message' => 'Profil entreprise créé avec succès.',
            'entreprise' => new EntrepriseResource($entreprise),
        ], 201);
    }

    /**
     * Modifier le profil entreprise
     */
    public function update(UpdateEntrepriseRequest $request)
    {
        $entreprise = $request->user()->entreprise;

        if (!$entreprise) {
            return response()->json([
                'message' => 'Profil entreprise introuvable.'
            ], 404);
        }

        $entreprise->update($request->validated());

        return response()->json([
            'message' => 'Profil entreprise mis à jour.',
            'entreprise' => new EntrepriseResource($entreprise),
        ]);
    }
    /**
 * Supprimer le profil entreprise
 */
public function destroy(Request $request)
{
    $entreprise = $request->user()->entreprise;

    if (!$entreprise) {
        return response()->json([
            'message' => 'Profil entreprise introuvable.'
        ], 404);
    }

    $entreprise->delete();

    return response()->json([
        'message' => 'Profil entreprise supprimé avec succès.'
    ], 200);
}

}
