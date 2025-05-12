<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreChoiceRequest;
use App\Http\Requests\UpdateChoiceRequest;
use App\Models\Choice;
use App\Models\Chapter;
use App\Http\Controllers\Controller;

class ChoiceController extends Controller
{
    public function index()
    {
        return response()->json(Choice::with('nextChapter')->get());
    }

    public function show(Choice $choice)
    {
        return response()->json($choice->load('nextChapter'));
    }


    public function getChoicesByChapter(Chapter $chapter)
    {
        return response()->json($chapter->choices()->with('nextChapter')->get());
    }


    public function store(StoreChoiceRequest $request)
    {
        $choice = Choice::create($request->validated());
        return response()->json($choice, 201);
    }

    public function update(UpdateChoiceRequest $request, Choice $choice)
    {
        $choice->update($request->validated());
        return response()->json($choice);
    }

    public function destroy(Choice $choice)
    {
        $choice->delete();
        return response()->json(null, 204);
    }
}
