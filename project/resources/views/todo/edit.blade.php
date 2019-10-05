@extends('todo.master')
@section('content')
<div class="container">
    <a href="{{route('todos.index')}}" class="btn btn-primary">Back</a>
    <form action="{{ route('todos.update', $item->id) }}" method="POST" class="" role="form">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            {{--{{ method_field('PUT') }}--}}
            <div class="form-group">
                <legend>Update todo</legend>
            </div>
            <div class="form-group">
                <label class="control-label" for="todo">Todo:</label>
                <input name="title" type="text" value="{{ $item->title }}" class="form-control" id="todo" placeholder="Enter todo">
            </div>
            <div class="form-group">
                <label class="control-label" for="todo">Mô tả:</label>
                <textarea name="content" class="form-control">{{ $item->content }}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="todo">Trạng thái:</label>
                <select name="status" class="form-control">
                    <option value="0" @if($item->status == 0) selected @endif>Chưa làm</option>
                    <option value="1" @if($item->status == 1) selected @endif>Đang làm</option>
                    <option value="2" @if($item->status == 2) selected @endif>Đã làm</option>
                </select>
            </div>
            <div class="form-group">
                <div class="">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
</div>
@endsection