<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Quiz;
class Quiz extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'minutes',
    ];

    public function relQuestions()
    {
        return $this->hasMany(Question::class);
    }

    public function storeQuiz($data)
    {
        return Quiz::create($data);
    }

    public function allQuiz()
    {
        return Quiz::all();
    }

    public function getQuizById($id)
    {
        return Quiz::find($id);
    }
    public function updateQuizById($data,$id)
    {
        return Quiz::find($id)->update($data);
    }

}
