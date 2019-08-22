@extends('layout.master')

@section('content')



<div class="container">
	<h1>{{$post->title}}</h1>
	<h5>{{$post->created_at}}</h5>
      	<hr>


<br>
	 {{$post->body}}
	 <hr>
	
<div class="comment">
   <ul class="list-group">
   	@foreach($post->comments as $comment)
    
    <li class="list-group-item"> {{$comment->body}} </li>


   	@endforeach


   </ul>

</div>
<hr>
<div class="card">
	 <div class="crad-block">
	 	
	 	<form class="form-group" method="POST" action="/posts/{{$post->id}}/comments">
	 		{{csrf_field()}}

	 	<textarea name="body" placeholder="type your comment" class="form-control"></textarea>

	 	<button type="submit" class="btn btn-primary">Publish</button>
	 	



	 </form>
	 </div>



</div>
@include('layout.errors')

</div>

@endsection