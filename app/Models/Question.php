<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quiz_id',
        
    ];

    public function relQuiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }
    public function relAnswer()
    {
        return $this->hasMany(Answer::class,'question_id','id');
    }
    public function storeQuestion($data)
    {
        
        $data['quiz_id']=$data['quiz'];
        return Question::create($data);
    }
    
    public function getQuestion()
    {
        return Question::orderBy('created_at','DESC')->with('relQuiz')->paginate(10);
    }

    public function getQuestionById($id)
    {
        return Question::find($id);
    }

    public function updateQuestion($data,$id)
    {
        $question=Question::find($id);
        $question['quiz_id']=$data['quiz'];
        $question['name']=$data['name'];
        $question->save();
        return $question;

    }
    public function deleteQuestion($id)
    {
        return Question::find($id)->delete();

    }

    

}
