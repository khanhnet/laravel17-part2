<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body style="text-align: center;">
<div class="container">
	<form action="{{ route('form',[],false) }}" method="POST" role="form">
		@csrf
	<legend>Form title</legend>

	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" id="" placeholder="Input field">
	</div>

	

	<button type="submit" class="btn btn-primary">Submit</button>
	<a href="{{ route('user',['id'=>1,'name'=>'key'],false) }}" class="btn btn-success">user 1</a>
	<a href="{{ route('admin.category.13,[],false') }}" class="btn btn-success">user 1</a>
</form>
</div>
</body>
</html>