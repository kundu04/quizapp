<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes=(new Quiz)->allQuiz();
        return view('backend.quiz.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$this->validateForm($request);
        $quiz=(new Quiz)->storeQuiz($data);
        return redirect()->back()->with('message','Quiz created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz=(new Quiz)->getQuizById($id);
        return view('backend.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$this->validateForm($request);
        $quiz=(new Quiz)->updateQuizById($data,$id);
        return redirect()->route('quiz.index')->with('message','Quiz updated successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Quiz)->deleteQuizById($id);
        return redirect()->route('quiz.index')->with('message','Quiz deleted successfully');

    }
    public function question($id){
        $quizzes=(new Quiz)->getAllQuestionByQuizId($id);
        return view('backend.quiz.questions',compact('quizzes'));
    }

    public function validateForm($request)
    {
        return $this->validate($request,[
            'name'=>'required|string',
            'description'=>'required|min:3|max:500',
            'minutes'=>'required|integer',
        ]);
    }
}
