@extends('master')

@section('content')
			<form action="{{url('posts')}}" method="POST" class="form-horizontal">
				<div class="form-group">
					<legend>Edit Repository</legend>
				</div>
				{{csrf_field()}}
				<div class="form-group">
				<label >id</label>
					<input type="text" value="{{$users->repository_id}}" name="repository_id" id="input" class="form-control">
				</div>
				<div class="form-group">
				<label>name</label>
					<input type="text" value="{{$users->name}}" name="name" id="input" class="form-control">
				</div>
				<div class="form-group">
				<label >url</label>
					<input type="text" value="{{$users->url}}" name="url" id="input" class="form-control">
				</div>
				<div class="form-group">
				<label>created at</label>
					<input type="text" value="{{$users->created_date}}" name="created_date" id="input" class="form-control">
				</div>
				<div class="form-group">
				<label >last push</label>
					<input type="text" value="{{$users->pushed_date}}" name="pushed_date" id="input" class="form-control">
				</div>
				<div class="form-group">
				<label>stars</label>
					<input type="text" value="{{$users->stars}}" name="stars" id="input" class="form-control">
				</div>
				<div class="form-group">
				<label >description</label>
					<input type="text" value="{{$users->description}}" name="description" id="input" class="form-control">
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary"> Update</button>
				</div>
			</form>
	@stop