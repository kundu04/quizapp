<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
use App\Models\Answer;

use DB;
class ExamController extends Controller
{
    public function assignExamCreate()
    {
        return view('backend.exam.assign');
    }
    public function assignExamStore(Request $request)
    {
        $this->validate($request,[
            'quiz_id'=>'required',
            'user_id'=>'required'
        ]);
        (new Quiz)->assignExam($request->all());
        return redirect()->back()->with('message','exam assigned successfully');

    }
    public function userExam()
    {
        $quizzes=Quiz::get();
        return view('backend.exam.index',compact('quizzes'));
    }
    public function removeExam(Request $request){
        $userId=$request->get('user_id');
        $quizId=$request->get('quiz_id');
        $quiz=Quiz::find($quizId);
        $result=Result::where('user_id',$userId)->where('quiz_id',$quizId)
        ->exists();
        if($result){
            return redirect()->back()->with('message','This user already play the quiz,you can not remove');
        }
        else{
            $quiz->relUser()->detach($userId);
            return redirect()->back()->with('message','you have removed that user');
        }

    }

    public function getQuizQuestions(Request $request,$quizId){
        $authUser=auth()->user()->id;

         //check if user has ben assigned a particular quiz
         $userId=DB::table('quiz_user')->where('user_id',$authUser)
         ->pluck('quiz_id')->toArray();
         if(!in_array($quizId,$userId)){
             return redirect()->to('/home')
             ->with('error','You are not assigned this exam');
         }
        $quiz=Quiz::find($quizId);
        $time=Quiz::where('id',$quizId)->value('minutes');
        $quizQuestion=Question::where('quiz_id',$quizId)->with('relAnswer')->get();
        $authUserHasPlayedQuiz=Result::where(['user_id'=>$authUser,'quiz_id'=>$quizId])->get();
        
        //has user played particular quiz
        $wasCompleted=Result::where('user_id',$authUser)
        ->whereIn('quiz_id',(new Quiz)->hasQuizAttempt())
        ->pluck('quiz_id')->toArray();
        if(in_array($quizId,$wasCompleted)){
            return redirect()->to('/home')->with('error','You are already participate this quiz');
        }
        return view('quiz',compact('quiz','time','quizQuestion','authUserHasPlayedQuiz'));

    }

    public function postQuiz(Request $request){
        $questionId=$request['questionId'];
        $answerId=$request['answerId'];
        $quizId=$request['quizId'];
        $authUser=auth()->user();

       

        return $userQuestionAnswer=Result::updateOrCreate(
            ['user_id'=>$authUser->id,
            'quiz_id'=>$quizId,
            'question_id'=>$questionId],
            ['answer_id'=>$answerId]
        );
    }

    public function viewResult($userId,$quizId){
        $results=Result::where('user_id',$userId)
        ->where('quiz_id',$quizId)->get();
        return view('result-detail',compact('results'));
    }

    public function result(){
        $quizzes=Quiz::get();
        return view('backend.result.index',compact('quizzes'));

    }

    public function userQuizResult($userId,$quizId){
        $results=Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
        $totalQuestion=Question::where('quiz_id',$quizId)->count();
        $attemptQuestion=Result::where('quiz_id',$quizId)
        ->where('user_id',$userId)
        ->count();
        $quiz=Quiz::where('id',$quizId)->get();
        $ans=[];
        foreach($results as $answer){
            array_push($ans,$answer->answer_id);
        }
        $userCorrectAnswer=Answer::whereIn('id',$ans)
        ->where('is_correct',1)->count();
        $userWrongAnswer=$totalQuestion-$userCorrectAnswer;
        $percentage=0;
        if($attemptQuestion){
            $percentage=($userCorrectAnswer/$totalQuestion)*100;
        }
        

        return view('backend.result.result',compact('results','quiz','totalQuestion','attemptQuestion','userCorrectAnswer','userWrongAnswer','percentage'));
    }
}
