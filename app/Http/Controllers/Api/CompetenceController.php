<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompetenceRequest;
use App\Http\Requests\UpdateCompetenceRequest;
use App\Http\Resources\CompetenceResource;
use App\Models\Competence;
use Illuminate\Http\Request;
class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $competences = Competence::latest()->get();

    return CompetenceResource::collection($competences);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetenceRequest $request)
{
    $competence = Competence::create($request->validated());

    return response()->json([
        'message' => 'Compétence créée avec succès.',
        'competence' => new CompetenceResource($competence),
    ], 201);
}
    /**
     * Display the specified resource.
     */
   public function show(Competence $competence)
    {
    return new CompetenceResource($competence);
    }
    /**
     * Update the specified resource in storage.
     */
   public function update(UpdateCompetenceRequest $request, Competence $competence)
{
    $competence->update($request->validated());

    return response()->json([
        'message' => 'Compétence mise à jour avec succès.',
        'competence' => new CompetenceResource($competence),
    ]);
}
    /**
     * Remove the specified resource from storage.
     */
  public function destroy(Competence $competence)
{
    $competence->delete();

    return response()->json([
        'message' => 'Compétence supprimée avec succès.'
    ], 200);
}
}
