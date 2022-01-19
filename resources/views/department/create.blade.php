@extends('layouts.app')

@section('Title','Create')

@section('content')
    <h3 class="text-center">Add New Doctor Account</h3>
    <div class="container">
        <form method="POST" action="{{route('department.store')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Department Name:</label>
                <input type="text" class="form-control"  name="name" id="exampleInputEmail1" aria-describedby="namelHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Department Description:</label>
                <input type="text" class="form-control" name="description" id="exampleInputname" aria-describedby="namelHelp">
            </div>

            <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
        </form>

    </div>

@endsection
