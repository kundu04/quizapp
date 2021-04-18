<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\QuizController;
use App\Http\controllers\QuestionController;
use App\Http\controllers\UserController;

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

Route::get('/', function () {
    return view('admin.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::Resource('quiz',QuizController::class);
Route::Resource('question',QuestionController::class);
Route::get('quiz/{id}/questions',[QuizController::class,'question'])->name('quiz.question');
Route::Resource('user',UserController::class);

