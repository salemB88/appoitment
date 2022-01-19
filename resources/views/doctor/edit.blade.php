@extends('layouts.app')

@section('Title','Edit')

@section('content')
    <h3 class="text-center"> {{__('Edit Doctor Account')}}</h3>
    <div class="container">
        <form method="POST" action="{{route('doctor.update',$doctors->id)}}">
            @csrf
        
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Doctor First Name:</label>
                <input type="text" class="form-control"  name="firstName" id="exampleInputEmail1" aria-describedby="namelHelp" value="{{$doctors->firstName}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Doctor Last Name:</label>
                <input type="text" class="form-control" name="lastName" id="exampleInputname" aria-describedby="namelHelp" value="{{$doctors->lastName}}">
            </div>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Email:</label>
                <input type="email" class="form-control" name="email" id="exampleInputPassword1" value="{{$doctors->email}}">
            </div>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Phone Number:</label>
                <input type="tel" class="form-control" name="phone" id="exampleInputPassword1" value="{{$doctors->phone}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Gender:</label>
                <select class="form-select" aria-label="Default select example"  name="gender" required>

                    <option value="Male" @if($doctors->gender=='Male') selected @else @endif>Male</option>
                    <option value="Female"   @if($doctors->gender=='Female') selected @else @endif>Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Description:</label>
                <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{$doctors->description}}">
            </div>

            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Department Work:</label>

            @foreach($departments->all() as $department)
            <div class="form-check" >
                <input class="form-check-input" type="checkbox" name="department[]" id="input_{{$department->name}}" value="{{$department->id}}"  @if(in_array($department->id,$doctorDepartments)) checked @else @endif>
                <label class="form-check-label" for="input_{{$department->name}}">{{$department->name}}</label>
            </div>
        @endforeach
            </div>


            <button type="submit" class="btn btn-primary">{{__('Edit')}}</button>
        </form>

    </div>

@endsection
