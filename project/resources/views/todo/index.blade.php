@extends('todo.master')
@section('content')
<div class="container">
	<a href="{{ route('todos.create') }}" class="btn btn-success">Add</a>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Todo</th>
					<th>Created at</th>
					<th>Updated at</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if(isset($list))
				@foreach($list  as $value)
				<tr>
					<td>{{ $value->id }}</td>
					<td>{{ $value->title }}</td>
					<td>{{ $value->created_at }}</td>
					<td>{{ $value->updated_at }}</td>
					<td>
						<a style="display: inline-block; width: 67px;" href="{{ route('todos.show',$value->id ) }}" class="btn btn-success">Show</a>
						<a style="display: inline-block; width: 67px;" href="{{ route('todos.edit',$value->id ) }}" class="btn btn-warning">Edit</a>
						<a style="display: inline-block; width: 67px;" href="{{ route('todos.destroy',$value->id ) }}" class="btn btn-danger">Del</a>
					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection