@extends('layouts.app')

@section('Title','Create')

@section('content')


<div class="container">
    <a class="btn btn-outline-success mb-5" href="{{route('doctor.create')}}">Add New Doctor Account</a>
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">Department</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @php($count=0)
            @foreach($doctors as $doctor)
                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td id="first-name">{{$doctor->firstName }} {{$doctor->lastName}}</td>
                    <td id="last-name">{{$doctor->email}}</td>
                    <td id="">{{$doctor->phone}}</td>
                    <td>{{$doctor->gender}}</td>
         
                    <td> {{$doctor->departments()->count()}}</td>
                    <td> <a href="{{route('doctor.edit',$doctor->id) }}"><i class="far fa-edit"></i></a>  </td>


                        <form method="POST" action="{{route('doctor.destroy',$doctor->id)}}">
                            @csrf
                    @method('DELETE')
                     <td> <button type="submit" onclick="return confirm('Are you Sure to delete Doctor Account?');"><i class="fas fa-trash"></i></button> </td>
                    </form>
                </tr>
            @endforeach

            </tbody>
        </table>


    </div>
@endsection
