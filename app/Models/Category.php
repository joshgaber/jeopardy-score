<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    const REGULAR_JEOPARDY = 'regular';
    const DOUBLE_JEOPARDY = 'double';
    const FINAL_JEOPARDY = 'final';

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
