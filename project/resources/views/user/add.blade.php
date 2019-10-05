@extends('user.master')
@section('content')
<div class="container">
	<a href="{{route('users.index')}}" class="btn btn-primary">Back</a>
	<form action="{{ route('users.store') }}" method="POST" class="" role="form">
            @csrf
            <div class="form-group">
                <legend>Add user</legend>
            </div>
            <div class="form-group">
                <label class="control-label" for="user">User:</label>
                <input name="name" type="text" class="form-control" id="user" placeholder="Enter user">
            </div>
            <div class="form-group">
                <label class="control-label" for="user">Email:</label>
                <input name="email" type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <div class="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
</div>
@endsection