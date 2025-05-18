<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

/* Route::get('/chapter/{id}', function ($id) {
    return Inertia::render('ChapterPage', ['chapterId' => $id]);
})->name('chapter'); */

Route::get('/story/{storyId}', function ($storyId) {
    return Inertia::render('ChapterPage', ['storyId' => $storyId]);
});


/* Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
}); */

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/story/{storyId}/chapter/{chapterId}', function ($storyId, $chapterId) {
    return Inertia::render('ChapterDetailPage', [
        'storyId' => (int) $storyId,
        'chapterId' => (int) $chapterId,
    ]);
})->name('chapter-detail');

Route::get('/story/{storyId}/chapter/{chapterId}', function ($storyId, $chapterId) {
    return Inertia::render('ChapterDetailPage', [
        'storyId' => (int) $storyId,
        'chapterId' => (int) $chapterId,
    ]);
})->name('chapter-detail');



Route::get('/story/{storyId}/chapter/{chapterId}', function ($storyId, $chapterId) {
    return Inertia::render('ChapterDetailPage', [
        'storyId' => (int) $storyId,
        'chapterId' => (int) $chapterId,
    ]);
})->name('chapter-detail');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
