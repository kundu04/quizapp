@extends('layouts.app')
@section('content')
<quiz-component
    :time="{{$quiz->minutes}}"
    :quiz-id="{{$quiz->id}}"
    :quiz-question="{{$quizQuestion}}"
    :has-quiz-played="{{$authUserHasPlayedQuiz}}"
    >
</quiz-component>


@endsection
