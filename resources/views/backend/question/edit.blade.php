@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('question.update',[$question->id])}}" method="Post">
                @csrf
                {{method_field('PUT')}}
                <div class="module">
                    <div class="module-head"><h3>Edit Question</h3></div>
                    <div class="module-body">
                        <div class="control-group">


                            <label class="control-label" for="minutes">Select Quiz</label>
                            <div class="controls">
                               
                                <select name="quiz" class="span8">
                                @foreach(App\Models\Quiz::all() as $quiz)
                                    <option value="{{$quiz->id}}" @if($quiz->id == $question->quiz_id) selected @endif >{{$quiz->name}}</option>
                                    @endforeach
                                </select>
                               
                                
                            </div>
                            @error('quiz')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            <label class="control-label" for="quiz_name">Question Name</label>
                            <div class="controls">
                                <input type="text" name="name" class="span8"
                                placeholder="Enter quiz name" value="{{$question->name}}">
                                

                            </div>
                            @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                          


                        </div>

                        <div class="control-group">


                            <label class="control-label" for="option">Option</label>
                            <div class="controls">
                                @foreach($question->relAnswer as $key=>$answer)
                                <input type="text" name="option[]" class="span7"
                                value="{{$answer->answer}}" >
                                <input type="radio" name="correct_answer" value="{{$key}}" 
                                @if($answer->is_correct) checked @endif>
                                <span>Is correct Answer</span>
                                @endforeach

                            </div>
                            @error('quiz')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                

                        </div>
                        
                        <div class="controls">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>


                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection