<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\comment;


class CommentsController extends Controller
{
    //
    public function store(post $post, Request $request)
    {
    	 $validatedData = $request->validate([
        'body' => 'required|min:2'
    ]);
      comment::create([
           'body'=>request('body'),
           'post_id'=>$post->id ,
           'user_id'=>auth()->user()->id  
           
      ]);
    	 // $post->addComment(request('body'));
       // auth()->post()->publish( 
       //  new comment(request('body'))
       // );
      return back();
    }
}
