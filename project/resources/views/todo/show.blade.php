@extends('todo.master')
@section('content')
<div class="container">
	<a href="{{route('todos.index')}}" class="btn btn-primary">Back</a>
	<hr>
	<legend>Detail</legend>
	<h1>{{ $todo->title }}</h1>
	<hr>
	<div>
		{{ $todo->content }}
	</div>
</div>
@endsection