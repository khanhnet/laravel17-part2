@extends('user.master')
@section('content')
<div class="container">
	<a href="{{route('users.index')}}" class="btn btn-primary">Back</a>
	<hr>
	<legend>Detail</legend>
	<h1>{{ $user->name }}</h1>
	<hr>
	<div>
		Email:{{ $user->email }}
	</div>
</div>
@endsection