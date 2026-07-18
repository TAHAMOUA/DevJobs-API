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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
