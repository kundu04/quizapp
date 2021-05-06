<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Answer;
class Result extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'question_id',
        'quiz_id',
        'answer_id',
    ];

    // public function relUser()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function relQuestion()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
    // public function relQuiz()
    // {
    //     return $this->belongsTo(Quiz::class);
    // }
    public function relAnswer()
    {
        return $this->belongsTo(Answer::class, 'answer_id', 'id');
    }


}
