@extends('layout.master')

@section('content')

<div class="container">
	<form method='POST' action="/posts">
  <div class="form-group" >
  	{{csrf_field()}}
    <label for="title">Enter title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">
    
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <input type="textarea" class="form-control" id="body" name="body" >
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>

  @include('layout.errors')

 
</form>


</div>
@endsection