<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use App\Models\Story;
use App\Http\Controllers\Controller;


class StoryController extends Controller
{
    public function index()
    {
        return response()->json(Story::all());
    }

    public function show(Story $story)
    {
        return response()->json($story->load('chapters.choices'));
    }

    public function store(StoreStoryRequest $request)
    {
        $story = Story::create($request->validated());
        return response()->json($story, 201);
    }

    public function update(UpdateStoryRequest $request, Story $story)
    {
        $story->update($request->validated());
        return response()->json($story);
    }

    public function destroy(Story $story)
    {
        $story->delete();
        return response()->json(null, 204);
    }
}
