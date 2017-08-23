@extends('master')

@section('content')
  
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Repository ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Created Date</th>
                <th>Last Push Date</th>
                <th>Description</th>
                <th>No. of Stars</th>

            </tr>
            
        <tr>
            <td>{{$user->repository_id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->url}}</td>
            <td>{{$user->created_date}}</td>
            <td>{{$user->pushed_date}}</td>
            <td>{{$user->description}}</td>
            <td>{{$user->stars}}</td>
                <td><a href="{{url('/show')}}" class="btn btn-primary" role="button">Back</a></td>
        </tr>
       
        </thead>
    </table>

@stop