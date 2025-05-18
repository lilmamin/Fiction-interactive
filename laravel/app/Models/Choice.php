<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Choice extends Model
{
    use HasFactory;

    protected $fillable = ['chapter_id', 'text', 'next_chapter_id', 'feedback'];
    protected $casts = [
        'is_ending' => 'boolean',
    ];



    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function nextChapter()
    {
        return $this->belongsTo(Chapter::class, 'next_chapter_id');
    }
}
