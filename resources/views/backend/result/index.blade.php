@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')

<div class="span9">
    <div class="content">
        <div class="module">
        @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module-head"><h3>Exam Details</h3></div>

            <div class="module-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Quiz</th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($quizzes)>0)
                        @foreach($quizzes as $quiz)
                        @foreach($quiz->relUser as $key=>$user)
                        <tr>
                            <td>{{$key+1}}</td>                        
                            <td>{{$user->name}}</td>
                            <td>{{$quiz->name}}</td>
                            <td>
                                <a href="{{route('quiz.question',[$quiz->id])}}">
                                    <button class="btn btn-info">Show all question</button>
                                </a>

                            </td>
                            <td>
                            <a href="{{route('results',[$user->id,$quiz->id])}}">
                                <button class="btn btn-primary">
                                    View Result
                                </button>
                            </a>
                            
                            </td>
                            
                            
                        </tr>
                        @endforeach
                        @endforeach
                        @else
                        <td>No quiz to display</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection