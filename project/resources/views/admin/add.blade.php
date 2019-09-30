@extends('admin.master')
@section('content')
<div class="container">
    <a href="/child" class="btn btn-primary">Back</a>
    <form action="" method="POST" role="form">
        <legend>Form title</legend>
    
        <div class="form-group">
            <label for="">name</label>
            <input type="text" class="form-control" id="" placeholder="Input field">
        </div>
    
        
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection