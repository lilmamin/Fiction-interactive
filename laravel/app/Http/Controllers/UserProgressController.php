<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\UserProgress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProgressController extends Controller
{
    public function index()
    {
        // Retourne la progression de l'utilisateur connecté
        return response()->json(
            UserProgress::where('user_id', auth()->id())->with(['story', 'chapter', 'choice'])->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'story_id' => 'required|exists:stories,id',
            'chapter_id' => 'required|exists:chapters,id',
            'choice_id' => 'nullable|exists:choices,id',
        ]);

        $data['user_id'] = auth()->id();

        // Met à jour ou crée une progression
        $progress = UserProgress::updateOrCreate(
            ['user_id' => $data['user_id'], 'story_id' => $data['story_id']],
            $data
        );

        return response()->json($progress, 201);
    }
}

