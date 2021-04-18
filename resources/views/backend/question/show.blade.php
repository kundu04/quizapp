@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')
<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head"><h3>Question Details</h3></div>

            <div class="module-body">
                <p><h3 class="heading">{{$question->name}}</h3></p>
                <table class="table table-message">
                    
                    <tbody>
                          @foreach($question->relAnswer as $key=>$answer)  
                        <tr class="red">
                        
                            <td class="cell-author hidden-phone hidden-tablet">
                            <b>{{$key+1}}. </b>{{$answer->answer}}
                            @if($answer->is_correct)
                            <span class="badge badge-success pull-right">correct</b></span>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <div class="module-foot">
                
                
                                <form id="delete-form{{$question->id}}" action="{{route('question.destroy',[$question->id])}}" method="Post">
                                    @csrf 
                                    {{method_field('DELETE')}}

                                </form>
                <a href="#" onclick="if(confirm('Do you want to delete?')){
                     event.preventDefault();
                    document.getElementById('delete-form{{$question->id}}').submit();
                    }
                    else{
                     event.preventDefault();
                }">
                <button type="submit" class="btn btn-danger pull-right">Delete</button>
                </a>
                <a href="{{route('question.edit',[$question->id])}}">
                <button class="btn btn-primary pull-right">Edit</button>
                </a>
                <a href="{{route('question.index')}}"><button type="submit" class="btn btn-inverse ">Back</button></a>
                                
                            

            </div>
        </div>
    </div>
</div>
@endsection