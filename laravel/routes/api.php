<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\StoryController;
use App\Http\Controllers\Api\V1\ChapterController;
use App\Http\Controllers\Api\V1\ChoiceController;
use App\Http\Controllers\Api\V1\UserProgressController;
use App\Http\Controllers\ProfileController;

use App\Models\Chapter;


// Route pour récupérer l'utilisateur connecté (authentification Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/me', [ProfileController::class, 'showCurrentUser']);

// Routes versionnées
Route::prefix('v1')->group(function () {
    // Ressources principales
    Route::apiResource('stories', StoryController::class);
    Route::apiResource('chapters', ChapterController::class);
    Route::apiResource('choices', ChoiceController::class);

    Route::middleware('auth')->group(function () {
        Route::get('user-progress', [UserProgressController::class, 'index']);
        Route::post('user-progress', [UserProgressController::class, 'store']);
    });

    // Route pour récupérer toutes les histoires
    Route::get('/stories', [StoryController::class, 'getStories']);

    // Route pour récupérer une histoire en particulier
    Route::get('/stories/{story_id}', [StoryController::class, 'getStory']);

    // Route spécifique pour récupérer les choix d’un chapitre
    Route::get('chapters/{chapter_id}/choices', [ChoiceController::class, 'getChoicesByChapter']);

    // Route spécifique pour récupérer les chapitres d’une histoire en particulier
    Route::get('/stories/{story_id}/chapters', [ChapterController::class, 'getChapterByStory']);



    /* Route::get('/chapters-with-validation', function () {
        return Chapter::with('choices')->get()->map(function ($chapter) {
            return [
                'chapter_id' => $chapter->id,
                'title' => $chapter->title,
                'has_content' => !empty($chapter->content),
                'choices_count' => $chapter->choices->count(),
                'all_choices_have_feedback' => $chapter->choices->every(fn($c) => !empty($c->feedback)),
            ];
        });
    }); */


});
