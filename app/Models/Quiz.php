<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;

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

    public function relUser(){
        return $this->belongsToMany(User::class,'quiz_user');
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
    public function deleteQuizById($id)
    {
        return Quiz::find($id)->delete();
    }

    public function getAllQuestionByQuizId($id){
        return Quiz::with('relQuestions')->where('id',$id)->get();
    }

    public function assignExam($data){
        $quizId=$data['quiz_id'];
        $quiz=Quiz::find($quizId);
        $userId=$data['user_id'];
        return $quiz->relUser()->syncWithoutDetaching($userId);

    }

   

}
