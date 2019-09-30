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
				@if(count($list)>0)
				@for($i=0;$i<count($list);$i++)
				<tr>
					<td>{{ $i+1 }}</td>
					<td>{{ $list[$i] }}</td>
					<td>23/8/2019</td>
					<td>23/8/2019</td>
					<td>
						<a style="display: inline-block; width: 67px;" href="{{ route('todos.show',1) }}" class="btn btn-success">Show</a>
						<a style="display: inline-block; width: 67px;" href="{{ route('todos.edit',1) }}" class="btn btn-warning">Edit</a>
					</td>
				</tr>
				@endfor
				@else
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection