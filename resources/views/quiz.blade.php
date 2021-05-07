@extends('layouts.app')
@section('content')
<quiz-component
    :time="{{$quiz->minutes}}"
    :quiz-id="{{$quiz->id}}"
    :quiz-question="{{$quizQuestion}}"
    :has-quiz-played="{{$authUserHasPlayedQuiz}}"
    >
</quiz-component>

<script type="text/javascript">
    window.oncontextmenu=function(){
        console.log("Right Click Disabled");
        return false;
    }

</script>

@endsection
