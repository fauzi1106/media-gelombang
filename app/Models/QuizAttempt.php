<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    protected $fillable = [
        'quiz_id',
        'user_id',
        'score'
    ];

    public function answers()
    {
        return $this->hasMany(StudentAnswer::class, 'attempt_id');
    }
}

