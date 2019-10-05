@extends('user.master')
@section('content')
<div class="container">
	<a href="{{ route('users.create') }}" class="btn btn-success">Add</a>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
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
					<td>{{ $value->name }}</td>
					<td>{{ $value->email}}</td>
					<td>{{ $value->created_at }}</td>
					<td>{{ $value->updated_at }}</td>
					<td>
						<a style="display: inline-block; width: 67px;" href="{{ route('users.show',$value->id ) }}" class="btn btn-success">Show</a>
						<a style="display: inline-block; width: 67px;" href="{{ route('users.edit',$value->id ) }}" class="btn btn-warning">Edit</a>
						<form style="display: inline-block;" action="{{ route('users.destroy', $value->id) }}" method="post" accept-charset="utf-8" onsubmit="return confirm('Bạn muốn xóa?');">
                                @csrf
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection