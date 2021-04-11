<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\Answer;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quiz_id',
        
    ];

    public function relQuiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function relAnswer()
    {
        return $this->hasMany(Answer::class);
    }

}
