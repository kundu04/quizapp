@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')

<div class="span9">
    <div class="content">
        <div class="module">
        @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module-head"><h3>All Quiz</h3></div>

            <div class="module-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>description</th>
                            <th>minutes</th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($quizzes)>0)
                        @foreach($quizzes as $key=>$quiz)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$quiz->name}}</td>
                            <td>{{$quiz->description}}</td>
                            <td>{{$quiz->minutes}}</td>
                            <td>
                                <a href="{{route('quiz.edit',[$quiz->id])}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form id="delete-form{{$quiz->id}}" action="{{route('quiz.destroy',[$quiz->id])}}" method="Post">
                                    @csrf 
                                    {{method_field('DELETE')}}

                                </form>
                                <a href="#" onclick="if(confirm('Do you want to delete?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$quiz->id}}').submit();

                                }
                                else{
                                    event.preventDefault();
                                }
                                ">
                                    <button type="submit" class="btn btn-danger">Delete</button></a>
                                
                            </td>
                            <!-- <a href="{{route('quiz.destroy',[$quiz->id])}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a> -->
                        </tr>
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