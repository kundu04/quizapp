@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')

<div class="span9">
    <div class="content">
        <div class="module">
        @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module-head"><h3>All Question</h3></div>

            <div class="module-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Quiz</th>
                            <th>Created at</th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($questions)>0)
                        @foreach($questions as $key=>$ques)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$ques->name}}</td>
                            <td>{{$ques->relQuiz->name}} quiz</td>
                            <td>{{date('F d,Y',strtotime($ques->created_at))}}</td>
                            <td>
                                <a href="{{route('question.show',[$ques->id])}}">
                                    <button class="btn btn-info">View</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('question.edit',[$ques->id])}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form id="delete-form{{$ques->id}}" action="{{route('question.destroy',[$ques->id])}}" method="Post">
                                    @csrf 
                                    {{method_field('DELETE')}}

                                </form>
                                <a href="#" onclick="if(confirm('Do you want to delete?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$ques->id}}').submit();

                                }
                                else{
                                    event.preventDefault();
                                }
                                ">
                                    <button type="submit" class="btn btn-danger">Delete</button></a>
                                
                            </td>
                           
                        </tr>
                        @endforeach
                        @else
                        <td>No question to display</td>
                        @endif
                    </tbody>
                </table>
                {{$questions->links()}}
            </div>
        </div>
    </div>
</div>
@endsection