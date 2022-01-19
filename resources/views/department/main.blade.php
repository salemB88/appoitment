@extends('layouts.app')

@section('Title','Create')

@section('content')


<div class="container">
    <a class="btn btn-outline-success mb-5" href="{{route('department.create')}}">Add New Department</a>
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Number Of Doctor</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @php($count=0)
            @foreach($departments as $department)
                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td id="name">{{$department->name}}</td>
                    <td id="description">{{$department->description}}</td>
                    <th scope="row">{{$department->doctors()->count()}}</th>

                    <td> <a href="{{route('department.edit',$department->id) }}"><i class="far fa-edit"></i></a>  </td>


                        <form method="POST" action="{{route('department.destroy',$department->id)}}">
                            @csrf
                    @method('DELETE')
                     <td> <button type="submit" onclick="return confirm('Are you Sure to delete department?');"><i class="fas fa-trash"></i></button></td>
                    </form>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection
