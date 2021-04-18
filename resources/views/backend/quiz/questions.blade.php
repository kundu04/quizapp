@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')
<div class="span9">
    <div class="content">
        <div class="module">
        @foreach($quizzes as $quiz)
            <div class="module-head"><h3>{{$quiz->name}}</h3></div>
            
            <div class="module-body">
            @foreach($quiz->relQuestions as $question)
                <p><h3 class="heading">{{$question->name}}</h3></p>
                <table class="table table-message">
                    
                    <tbody>
                          
                        <tr class="red">
                        
                            <td class="cell-author hidden-phone hidden-tablet">
                            @foreach($question->relAnswer as $key=>$answer)  
                            <p><b>{{$key+1}}. </b>{{$answer->answer}}
                            @if($answer->is_correct)
                            <span class="badge badge-success ">correct</b></span></p>
                            @endif
                            @endforeach              

                            </td>
                        </tr>
                        
                    </tbody>
                </table>
               @endforeach
            </div>
            <div class="module-foot">
                
                
                                <form id="delete-form{{$quiz->id}}" action="{{route('question.destroy',[$quiz->id])}}" method="Post">
                                    @csrf 
                                    {{method_field('DELETE')}}

                                </form>
                <a href="#" onclick="if(confirm('Do you want to delete?')){
                     event.preventDefault();
                    document.getElementById('delete-form{{$quiz->id}}').submit();
                    }
                    else{
                     event.preventDefault();
                }">
                <button type="submit" class="btn btn-danger pull-right">Delete</button>
                </a>
                <a href="{{route('question.edit',[$quiz->id])}}">
                <button class="btn btn-primary pull-right">Edit</button>
                </a>
                <a href="{{route('quiz.index')}}"><button type="submit" class="btn btn-inverse ">Back</button></a>
                @endforeach            
                            

            </div>
        </div>
    </div>
</div>
@endsection