<?php
use App\Http\Controllers\Api\EntrepriseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OffreController;
use App\Http\Controllers\Api\CompetenceController;
use App\Http\Controllers\Api\OffreCompetenceController;
use App\Http\Controllers\Api\CandidatureController;
Route::get('/test', function () {
    return response()->json([
        'message' => 'API DevJobs works!'
    ]);
});




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

});

Route::middleware(['auth:sanctum', 'admin'])->get('/admin-test', function () {
    return response()->json([
        'message' => 'Welcome Admin'
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/entreprises', [EntrepriseController::class, 'store']);
    
    Route::get('/entreprises', [EntrepriseController::class, 'index']);
    Route::get('/entreprises/me', [EntrepriseController::class, 'show']);
    
    Route::put('/entreprises/{me}', [EntrepriseController::class, 'update']);
    Route::delete('/entreprises/me', [EntrepriseController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'entreprise'])->group(function () {

    Route::get('/offres', [OffreController::class, 'index']);

    Route::post('/offres', [OffreController::class, 'store']);

    Route::get('/offres/{id}', [OffreController::class, 'show']);

    Route::put('/offres/{id}', [OffreController::class, 'update']);

    Route::delete('/offres/{id}', [OffreController::class, 'destroy']);
    Route::post('/offres/{offre}/competences',[OffreCompetenceController::class, 'sync']);
    Route::get('/offres/{offre}/competences', [OffreCompetenceController::class, 'index']);
    Route::delete('/offres/{offre}/competences/{competence}',[OffreCompetenceController::class, 'destroy']);
    });

Route::middleware(['auth:sanctum', 'admin'])->group(function () {

    Route::apiResource('competences', CompetenceController::class);

});
Route::middleware(['auth:sanctum', 'candidat'])->group(function () {

    Route::post('/candidatures', [CandidatureController::class, 'store']);

});

