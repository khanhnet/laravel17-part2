@extends('admin.master')
@section('content')
<div class="container">
    <a href="{{route('todos.index')}}" class="btn btn-primary">Back</a>
    <form action="{{route('todos.update', $todo->id )}}" method="Put" class="" role="form">
        @csrf
        <div class="form-group">
            <legend>Edit todo</legend>
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Todo:</label>
            <input name="todo" type="text" class="form-control" id="todo" value="{{ $todo->title }}">
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Mô tả:</label>
            <input name="todo" type="text" class="form-control" id="content" value="{{ $todo->content }}">
        </div>

        <div class="form-group">
            <div class="">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection