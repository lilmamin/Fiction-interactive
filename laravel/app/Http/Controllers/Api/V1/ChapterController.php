<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Models\Chapter;
use App\Http\Controllers\Controller;

class ChapterController extends Controller
{
    public function index()
    {
        return response()->json(Chapter::with('choices')->get());
    }

    public function show(Chapter $chapter)
    {
        return response()->json($chapter->load('choices'));
    }

    public function store(StoreChapterRequest $request)
    {
        $chapter = Chapter::create($request->validated());
        return response()->json($chapter, 201);
    }

    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->validated());
        return response()->json($chapter);
    }

    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return response()->json(null, 204);
    }
}
