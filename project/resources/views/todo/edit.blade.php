@extends('admin.master')
@section('content')
<div class="container">
    <a href="{{route('todos.index')}}" class="btn btn-primary">Back</a>
    <form action="#" method="POST" class="" role="form">
        @csrf
        {{method_field('put')}}
        <div class="form-group">
            <legend>Edit todo</legend>
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Todo:</label>
            <input name="todo" type="text" class="form-control" id="todo" value="">
        </div>
        <div class="form-group">
            <label class="control-label" for="todo">Mô tả:</label>
            <textarea name="todo" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <div class="">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection