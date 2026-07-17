<?php
use App\Http\Controllers\Api\EntrepriseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
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

    Route::get('/entreprises/{me}', [EntrepriseController::class, 'show']);

    Route::put('/entreprises/{me}', [EntrepriseController::class, 'update']);

});