@extends('layout.master')

@section('content')

<div class="container">
	@foreach($posts as $post)
      <h1><a href="/post/{{$post->id}}"> {{$post->title}} </a>  </h1>
      <h5>{{$post->user['name']}} on  {{$post->created_at->diffForHumans()}}</h5>
      	<hr>
   
     
      {{$post->body}}
 <br> <br> <br>
	@endforeach


</div>


@endsection