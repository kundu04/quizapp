<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
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
}
