<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChapterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'story_id' => 'sometimes|required|exists:stories,id',
            'content' => 'sometimes|required|string',
        ];
    }
}

