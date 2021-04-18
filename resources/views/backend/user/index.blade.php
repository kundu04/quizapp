@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')

<div class="span9">
    <div class="content">
        <div class="module">
        @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module-head"><h3>All User</h3></div>

            <div class="module-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>password</th>
                            <th>occupation</th>
                            <th>address</th>
                            <th>phone</th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users)>0)
                        @foreach($users as $key=>$user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->visible_password}}</td>
                            <td>{{$user->occupation}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone}}</td>
                           
                            <td>
                                <a href="{{route('user.edit',[$user->id])}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form id="delete-form{{$user->id}}" action="{{route('user.destroy',[$user->id])}}" method="Post">
                                    @csrf 
                                    {{method_field('DELETE')}}

                                </form>
                                <a href="#" onclick="if(confirm('Do you want to delete?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$user->id}}').submit();

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
                        <td>No quiz to display</td>
                        @endif
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
@endsection