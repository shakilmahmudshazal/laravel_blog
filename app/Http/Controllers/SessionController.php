<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\mail\welcomeAgain;
class SessionController extends Controller
{
  
    //
    public function create()
    {
      return view('sessions.create');
    }

   public function store()
   {
    if(!auth()->attempt(request(['email','password'])))
    {
    	return back();
    }
    \Mail::to(auth()->user())->send(new welcomeAgain(auth()->user()));
    return redirect()->home();

     


   }

    public function destroy()
    {
    	auth()->logout();
    	return redirect()->home();
    }
}
