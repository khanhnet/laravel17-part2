@extends('todo.master')
@section('content')
<div class="container">
	<a href="{{route('todos.index')}}" class="btn btn-primary">Back</a>
	<form action="{{ route('todos.store') }}" method="POST" class="" role="form">
            @csrf
            <div class="form-group">
                <legend>Add todo</legend>
            </div>
            <div class="form-group">
                <label class="control-label" for="todo">Todo:</label>
                <input name="title" type="text" class="form-control" id="todo" placeholder="Enter todo">
            </div>
            <div class="form-group">
                <label class="control-label" for="todo">Mô tả:</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="todo">Trạng thái:</label>
                <select name="status" class="form-control">
                    <option value="0">Chưa làm</option>
                    <option value="1">Đang làm</option>
                    <option value="2">Đã làm</option>
                </select>
            </div>
            <div class="form-group">
                <div class="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
</div>
@endsection