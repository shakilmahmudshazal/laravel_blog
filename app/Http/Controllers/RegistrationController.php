<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\mail\welcome;
class RegistrationController extends Controller
{
    //

  public function __construct()
  {
     $this->middleware('guest');

  }

    public function create()
    {
       
       return view('registrations.create');
    }
    public function store( Request $request)
    {
    	$validaterData=$request->validate([
          'name'=>'required',
          'email'=>'required',
          'password'=>'required|confirmed'
         
    	]);

    	$user= new user;
         $user->name=request('name');
         $user->email=request('email');
         $user->password=bcrypt(request('password'));
         $user->save();
        \Mail::to($user)->send(new welcome($user));
    	//::create(request(['name','email','password']));
   		auth()->login($user);
   		return redirect()->home();

    }
}
