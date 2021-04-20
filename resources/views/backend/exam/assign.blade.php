@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('exam.store')}}" method="Post">
                @csrf
                <div class="module">
                    <div class="module-head"><h3>Create Quiz</h3></div>
                    <div class="module-body">
                        <div class="control-group">

                        <label class="control-label" for="quiz">Select Quiz</label>
                            <div class="controls">
                               
                                <select name="quiz_id" class="span8">
                                @foreach(App\Models\Quiz::all() as $quiz)
                                    <option value="{{$quiz->id}}" >{{$quiz->name}}</option>
                                    @endforeach
                                </select>
                               
                                
                            </div>
                            @error('quiz')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    

                        <label class="control-label" for="user">Select User</label>
                            <div class="controls">
                               
                                <select name="user_id" class="span8">
                                @foreach(App\Models\User::where('is_admin','0')->get() as $user)
                                    <option value="{{$user->id}}" >{{$user->name}}</option>
                                    @endforeach
                                </select>
                               
                                
                            </div>
                            @error('user')
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