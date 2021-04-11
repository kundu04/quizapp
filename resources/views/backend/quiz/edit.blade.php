@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('quiz.update',[$quiz->id])}}" method="Post">
                @csrf
                {{method_field('Put')}}
                <div class="module">
                    <div class="module-head"><h3>Create Quiz</h3></div>
                    <div class="module-body">
                        <div class="control-group">

                            <label class="control-label" for="quiz_name">Quiz Name</label>
                            <div class="controls">
                                <input type="text" name="name" class="span8"
                                placeholder="Enter quiz name" value="{{$quiz->name}}">
                                

                            </div>
                            @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <label class="control-label" for="description">Quiz Description</label>
                            <div class="controls">
                                <textarea name="description" class="span8"
                                placeholder="Enter quiz description" >{{$quiz->description}}</textarea>
                               

                            </div>
                            @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <label class="control-label" for="minutes">Minutes</label>
                            <div class="controls">
                                <input type="text" name="minutes" class="span8"
                                placeholder="minutes" value="{{$quiz->minutes}}">
                               

                            </div>
                            @error('minutes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>



                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection