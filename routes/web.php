<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\QuizController;
use App\Http\controllers\QuestionController;
use App\Http\controllers\UserController;
use App\Http\controllers\ExamController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes([
    'register'=>false,
    'reset'=>false,
    'verify'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('quiz/{quizid}',[ExamController::class,'getQuizQuestions'])->middleware('auth');
Route::post('quiz/create',[ExamController::class,'postQuiz'])->middleware('auth');
Route::get('/result/user/{userId}/quiz/{quizId}',[ExamController::class,'viewResult'])->name('result')->middleware('auth');
Route::group(['middleware'=>'isAdmin'],function(){
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::Resource('quiz',QuizController::class);
    Route::Resource('question',QuestionController::class);
    Route::get('quiz/{id}/questions',[QuizController::class,'question'])->name('quiz.question');
    Route::Resource('user',UserController::class);
    Route::get('exam/assign',[ExamController::class,'assignExamCreate'])->name('exam.assign');
    Route::post('exam/assign',[ExamController::class,'assignExamStore'])->name('exam.store');
    Route::get('exam/user',[ExamController::class,'userExam'])->name('exam.view');
    Route::post('exam/remove',[ExamController::class,'removeExam'])->name('exam.remove');


});


