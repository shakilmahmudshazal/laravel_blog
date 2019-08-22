<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

use Carbon\Carbon;
class PostsController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except(['index','show','showall']);
    }
    
    public function index()
    {
    	return view('posts.index');
    }

    public function show ($id)
    {
    	$post= post::find($id);

    	return view('posts.post',compact('post'));
    }

    public function create()
    {
    	return view('posts.create');
    }


    public function store(Request $request)
    {
        // $this->validate(request(),[
        //      'title'=>'required',
        //      'body'=>'reuired'


        // ]);
        $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
    ]);


         // post::create([
         //    'title'=>request('title'),
         //    'body'=>request('body'),
         //    'user_id'=>auth()->id()


         // ]);

    	//dd(request()->all());

        auth()->user()->publish(
            new post(request(['title','body']))
        

        );

    	return redirect('/');
    }


   public function showall ()
    {

        $posts=post::latest()->filter(request(['month','year']))->get();
        // $posts= post::latest()->get();
        // $posts= post::latest();

        // if($month=request('month'))
        // {
        //     $posts->whereMonth('created_at',Carbon::parse($month)->month);
        // }
        // if($year=request('year'))
        // {
        //     $posts->whereYear('created_at',$year);
        // }
      
        // $posts= $posts->get();


        //$archives=post::archives();

        // return $archives;

        return view('posts.postall',compact('posts'));
    }

}
