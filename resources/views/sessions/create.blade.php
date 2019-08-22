@extends('layout.master')

@section('content')

<form method="POST" action="/login">
	
	{{csrf_field()}}

	
	<div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" type="email" name="email" id="email" required>

    </div>
    <div class="form-group">
		<label for="password">Password</label>
		<input class="form-control" type="password" name="password" id="password" required> 

	</div>
	

	<div class="form-group">
		
		 <button type="submit" class="btn btn-primary">Submit</button>

	</div>

</form>

@endsection