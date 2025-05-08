<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\StoryController;
use App\Http\Controllers\Api\V1\ChapterController;
use App\Http\Controllers\Api\V1\ChoiceController;

// Route pour récupérer l'utilisateur connecté (authentification Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes versionnées (conforme aux consignes : /api/v1/...)
Route::prefix('v1')->group(function () {
    // Ressources principales
    Route::apiResource('stories', StoryController::class);
    Route::apiResource('chapters', ChapterController::class);
    Route::apiResource('choices', ChoiceController::class);

    // Route spécifique pour récupérer les choix d’un chapitre
    Route::get('chapters/{chapter}/choices', [ChoiceController::class, 'index']);
});
