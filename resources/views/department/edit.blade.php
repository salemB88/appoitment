@extends('layouts.app')

@section('Title','Edit')


@section('content')
    <h3 class="text-center"> {{__('Edit Doctor Account')}}</h3>
    <div class="container">


        <form method="POST" action="{{route('department.update',$department->id)}}">
            @csrf
            @method('PATCH')
       
            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Department Name:</label>
                <input type="text" class="form-control"  name="name" id="exampleInputEmail1" aria-describedby="namelHelp" value="{{$department->name}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Department Description:</label>
                <input type="text" class="form-control" name="description" id="exampleInputname" aria-describedby="namelHelp"  value="{{$department->description}}">
            </div>

            <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
        </form>



    </div>

@endsection
