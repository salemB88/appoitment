@extends('layouts.app')

@section('Title','Create')

@section('content')
    <h3 class="text-center">Add New Doctor Account</h3>
    <div class="container">
        <form method="POST" action="{{route('doctor.store')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Doctor First Name:</label>
                <input type="text" class="form-control"  name="firstName" id="exampleInputEmail1" aria-describedby="namelHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Doctor Last Name:</label>
                <input type="text" class="form-control" name="lastName" id="exampleInputname" aria-describedby="namelHelp">
            </div>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Email:</label>
                <input type="email" class="form-control" name="email" id="exampleInputPassword1">
            </div>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Phone Number:</label>
                <input type="tel" class="form-control" name="phone" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Gender:</label>
                <select class="form-select" aria-label="Default select example"  name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Description:</label>
                <input type="text" class="form-control" name="description" id="exampleInputPassword1">
            </div>



            {{--Get all departments to can choice doctor department work--}}

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Doctor Department Work:</label>

            @foreach($departments->all() as $department)
            <div class="form-check" >
                <input class="form-check-input" type="checkbox" name="department[]" id="input_{{$department->name}}" value="{{$department->id}}">
                <label class="form-check-label" for="input_{{$department->name}}">{{$department->name}}</label>
            </div>
        @endforeach
            </div>


            <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
        </form>

    </div>

@endsection
