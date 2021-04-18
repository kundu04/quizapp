@extends('backend.layouts.master')
@section('title','create quiz')
@section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('user.update',[$users->id])}}" method="Post">
                @csrf
                {{method_field('PUT')}}
                <div class="module">
                    <div class="module-head"><h3>Update User</h3></div>
                    <div class="module-body">
                        <div class="control-group">

                            <label class="control-label" for="quiz_name"> Name</label>
                            <div class="controls">
                                <input type="text" name="name" class="span8"
                                placeholder="Enter your name" value="{{$users->name}}" >
                                

                            </div>
                            @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    

                            <label class="control-label" for="email"> Email</label>
                            <div class="controls">
                                <input type="email" name="email" class="span8"
                                placeholder="Enter  email" value="{{$users->email}}" >
                                

                            </div>
                            @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            <label class="control-label" for="quiz_name"> Password</label>
                            <div class="controls">
                                <input type="text" name="password" class="span8"
                                placeholder="Enter password" value="{{$users->visible_password}}" >
                                

                            </div>
                            @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    

                            
                            <label class="control-label" for="occupation">Occupation</label>
                            <div class="controls">
                                <input type="text" name="occupation" class="span8"
                                placeholder="Enter occupation" value="{{$users->occupation}}" >
                                

                            </div>
                            @error('occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                    

                            
                            <label class="control-label" for="address">Address</label>
                            <div class="controls">
                                <textarea name="address" class="span8"
                                placeholder="Enter your address" >{{$users->address}}</textarea>
                               

                            </div>
                            @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <label class="control-label" for="minutes">Phone</label>
                            <div class="controls">
                                <input type="number" name="phone" class="span8"
                                placeholder="phone number" value="{{$users->phone}}">
                               

                            </div>
                            @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>



                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection